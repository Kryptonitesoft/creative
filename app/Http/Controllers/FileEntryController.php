<?php namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Models\Fileentry;
use App\Http\Requests\FileRequest;
use App\Http\Requests\FileUploadRequest;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;

use Auth;
use Redirect;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FileEntryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		extract(Request::all());
		$isReverse = ($isReverse == 'true') ? 'desc' : 'asc';
		
		if($type == 'media') {
			$entries = Fileentry::where('type', '!=', 'document')
								->where('type', '!=', 'presentation')
								->where('type', '!=', 'ebook');
		} elseif($type == 'file') {
			$entries = Fileentry::where('type', '!=', 'image')
								->where('type', '!=', 'video')
								->exclude(['link']);
		} elseif($type != '') {
			$entries = Fileentry::whereType($type);
		} else {
			$entries = new Fileentry;
		}
		
		if(!Auth::user() || Request::has("isVisible"))
			$entries = $entries->whereIsvisible(1);
	 	return $entries->orderBy($orderBy, $isReverse)->paginate($itemPerPage);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(FileRequest $request)
	{
		$entry = array_except($request->all(), array('fileName'));

		if($entry['type'] != 'video') {
			$filename = $request->get("fileName");
			$src = 'fileStorage/temp/' . $filename;
	  		$des = 'fileStorage/' . $entry['type'] . 's/' . $filename;
	  		rename($src, $des);
			$entry['link'] = $des;
			$entry['size'] = filesize($des);
			if($entry['type'] == 'image') {
				$manager = new ImageManager(array('driver' => 'gd'));
				$image = $manager->make($des)->resize(266, 150)->save($des . 't.jpg', 80);
			}
	  	}
		
		Fileentry::create($entry);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Fileentry $entry)
	{
		if($entry['type'] != 'image' && $entry['type'] != 'video') {
			$entry = array_except($entry, array("link"));
		}
		return $entry->toJson();
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Fileentry $entry)
	{
		$entry->update(Request::all());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Fileentry $entry)
	{
        if($entry->type != 'video' && $entry->link != ""){
        	unlink($entry->link);
        	unlink($entry->link . 't.jpg');
        }
		$entry->delete();
	}


	public function upload(FileUploadRequest $request) {
		$filename = $_FILES['file']['name'];
		$destination = 'fileStorage/temp/' . $filename;
		move_uploaded_file($_FILES['file']['tmp_name'], $destination);
		return $destination;
	}

	public function download(Fileentry $entry) {
		$extension = File::extension($entry->link);
		$password = file_get_contents('../filepassword');
		Request::get('pass');
		if($password == Request::get('pass')) {
			if(!Auth::user()) $entry->increment('views');
			return response()->download($entry->link, $entry->title.'.'.$extension);
		} else {
			return redirect("documents")->withErrors(['pnm' => ""]);
		}
	}

	public function changeVisibility(Fileentry $entry) {
		$entry->isVisible = !$entry->isVisible;
		$entry->save();
	}

	public function incrementHits(Fileentry $entry) {
		if(Auth::user()) return;
        $entry->increment('views');
	}

}
