<?php namespace App\Http\Controllers;

use Input;
use Redirect;
use App\Models\Exam;
use App\Http\Requests;
use App\Http\Requests\ExamRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ExamsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$exams = Exam::all();
		return view('exams.index', compact('exams'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ExamRequest $request)
	{
		Exam::create($request->all());

		return Redirect::route('exams.index')->with('message', 'Exam is listed');
	}

    /**
     * @param Exam $exam
     * @return \Illuminate\View\View
     */
	public function show(Exam $exam)
	{
		return view('exams.show', compact('exam'));
	}

    /**
     * @param Exam $exam
     * @return \Illuminate\View\View
     */
	public function edit(Exam $exam)
	{
		return view('exams.edit', compact('exam'));
	}

    /**
     * @param Exam $exam
     * @param ExamRequest $request
     * @return mixed
     */
	public function update(Exam $exam, ExamRequest $request)
	{
		$input = array_except($request->all(), '_method');
        $exam->update($input);

        return Redirect::route('exams.index')->with('message', 'Exam successfully updated.');
	}

    /**
     * @param Exam $exam
     * @return mixed
     * @throws \Exception
     */
	public function destroy(Exam $exam)
	{
		$exam->delete();

        return Redirect::route('exams.index')->with('message', 'Successfully exam record deleted');
	}

}
