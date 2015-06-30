<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ExamRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'title'      => 'required|max:50',
			'subject'    => 'required',
			'class'	     => 'required|numeric',
			'mark_range' => 'required|numeric',
			'date'       => 'required|date',
		];
	}

}
