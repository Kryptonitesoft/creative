<?php namespace App\Http\Controllers;

use App\Models\Fileentry;
use App\Http\Requests;
use App\Http\Requests\FileRequest;
use App\Http\Requests\FileEditRequest;
use App\Http\Controllers\Controller;

use Request;
use Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class FileEntryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$entries = Fileentry::all();

		return view('files.index', compact('entries'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(FileRequest $request)
	{


		$file = $request->file('filefield');
		$extension = $file->getClientOriginalExtension();
		Storage::disk('local')->put($file->getFilename() . '.' . $extension, File::get($file));
		$entry = new Fileentry();
		$entry->filename = $file->getFilename();
		$entry->mime = $file->getClientMimeType();
		$entry->extension = $extension;
		$entry->type = $request->get('type');
		$entry->title = $request->get('title');
		$entry->size = $file->getClientSize();

		$entry->save();

		return Redirect::route('files.index')->with('message', 'Project created');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Fileentry $entry)
	{
		$filename = $entry->filename . '.' . $entry->extension;
		$file = Storage::disk('local')->get($filename);

		return (new Response($file, 200))
				->header('Content-Type', $entry->mime);
	}


	// public function edit(Fileentry $entry){
	// 	return view('files.edit');
	// }



	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Fileentry $entry, FileEditRequest $request)
	{
		$input = array_except($request->all() , '_method');
		$entry->update($input);

		return Redirect::route('files.index')->with('message', 'File info updated');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Fileentry $entry)
	{
		$entry->delete();
		$filename = $entry->filename . '.' . $entry->extension;
		if (Storage::exists($filename)) {
			Storage::delete($filename);
		}

		return Redirect::route('files.index');
	}

}
