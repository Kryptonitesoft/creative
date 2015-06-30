<?php namespace App\Http\Controllers;

use Redirect;
use App\Models\Exam;
use App\Models\Result;
use App\Http\Requests;
use App\Http\Requests\ResultRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Tests\RedirectResponseTest;

class ResultsController extends Controller {

	public function index(Exam $exam){
		return Result::where('exam_id', $exam->id)->orderBy('sroll', 'asc')->get()->toJson();
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ResultRequest $request, Exam $exam)
	{
        $input = $request->all();
        $input['exam_id'] = $exam->id;

        return Result::create($input)->toJson();
	}

	public function show(Exam $exam, Result $result) {
		return $result;
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(ResultRequest $request, Exam $exam, Result $result)
	{
		$result->update($request->all());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Exam $exam, Result $result)
	{
		$result->delete();
	}

}
