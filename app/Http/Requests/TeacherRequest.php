<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class TeacherRequest extends Request {

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
			'id' 		  => 'numeric',
			'name'        => 'required | max:60',
			'designation' => 'max:30',
			'teaches'     => 'required | max:50',
			'education'   => 'required | max:100',
			'decription'  => 'max:300',
			'email'       => 'email | max:100 | unique:teachers,email,'.Request::get('id'),
			'fb'          => 'max:100 | unique:teachers,fb,'.Request::get('id'),
			'phone'       => 'numeric | unique:teachers,phone,'.Request::get('id')
		];
	}

}
