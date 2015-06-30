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
		return Exam::orderBy("date", "desc")->paginate(Input::get("itemPerPage"));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ExamRequest $request)
	{
		return Exam::create($request->all())->toJson();
	}

    /**
     * @param Exam $exam
     * @return \Illuminate\View\View
     */
	public function show(Exam $exam)
	{
		return $exam;
	}

    /**
     * @param Exam $exam
     * @param ExamRequest $request
     * @return mixed
     */
	public function update(Exam $exam, ExamRequest $request)
	{
        $exam->update($request->all());
	}

    /**
     * @param Exam $exam
     * @return mixed
     * @throws \Exception
     */
	public function destroy(Exam $exam)
	{
		$exam->delete();
	}

}
