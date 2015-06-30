<?php namespace App\Http\Controllers;

use Redirect;
use App\Models\Admission;
use App\Http\Requests;
use App\Http\Requests\AdmissionRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Tests\RedirectResponseTest;

class AdmissionsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Admission::orderBy("name", "asc")->get()->toJson();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AdmissionRequest $request)
	{
		$filename = $request->get("fileName");
		$src = 'fileStorage/temp/'   . $filename;
  		$des = 'fileStorage/persons/' . $request->get('name') . '.jpg';
  		rename($src, $des);
		
		$student = array_except($request->all(), array('fileName'));
		$student['image'] = $des;

        Admission::create($student);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Admission $admission)
	{
		return $admission;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(AdmissionRequest $request, Admission $admission)
	{
		$record = array_except($request->all(), array('fileName'));
		if($request->get('image') != $admission->image) {
			if(!preg_match('/^img/', $admission->image))
				unlink($admission->image);
			$filename = $request->get("fileName");
			$src = 'fileStorage/temp/'   . $filename;
	  		$des = 'fileStorage/persons/' . $request->get('name') . '.jpg';
	  		rename($src, $des);
	  		$record['image'] = $des;
		}
		$admission->update($record);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Admission $admission)
	{
		if(!preg_match('/^img/', $admission->image))
			unlink($admission->image);
		$admission->delete();
	}

}
