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


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ResultRequest $request, Exam $exam)
	{
        $input = $request->all();
        $input['exam_id'] = $exam->id;

        //dd($input);

        Result::create($input);

        return Redirect::route('exams.show', $exam->id)->with('message', 'Result successfully added.');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Exam $exam, Result $result)
	{
		return view('results.edit', compact('exam', 'result'));
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

        return Redirect::route('exams.show', $exam->id)->with('message', 'Successfully result updated');
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

        return Redirect::route('exams.show', $exam->id)->with('message', 'Successfully record deleted.');
	}

}
