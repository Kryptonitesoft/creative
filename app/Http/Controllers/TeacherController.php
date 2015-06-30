<?php namespace App\Http\Controllers;

use Redirect;
use App\Models\Teacher;
use App\Http\Requests;
use App\Http\Requests\TeacherRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Tests\RedirectResponseTest;

class TeacherController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Teacher::all()->toJson();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(TeacherRequest $request)
	{
		if($request->get("fileName")) {
			$filename = $request->get("fileName");
			$src = 'fileStorage/temp/'   . $filename;
	  		$des = 'fileStorage/persons/' . $request->get('name') . '.jpg';
	  		rename($src, $des);
			$teacher['image'] = $des;
		}
		
		$teacher = array_except($request->all(), array('fileName'));
		Teacher::create($teacher);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Teacher $teacher)
	{
		return $teacher->toJson();
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(TeacherRequest $request, Teacher $teacher)
	{
		$record = array_except($request->all(), array('fileName'));
		if($request->get('image') != $teacher->image) {
			if(!preg_match('/^img/', $teacher->image))
				unlink($teacher->image);
			$filename = $request->get("fileName");
			$src = 'fileStorage/temp/'   . $filename;
	  		$des = 'fileStorage/persons/' . $request->get('name') . '.jpg';
	  		rename($src, $des);
	  		$record['image'] = $des;
		}
		$teacher->update($record);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Teacher $teacher)
	{			
		if(!preg_match('/^img/', $teacher->image) && $teacher->image != "")
			unlink($teacher->image);
		$teacher->delete();
	}

}
