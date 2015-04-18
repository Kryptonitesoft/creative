<?php namespace App\Http\Controllers;


use App\Models\Exam;
use App\Models\Result;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ResultsController extends Controller {



	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Exam $exam)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Exam $exam, Result $result)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Exam $exam, Result $result)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Exam $exam, Result $result)
	{
		//
	}

}
