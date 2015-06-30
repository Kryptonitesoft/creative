<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdmissionRequest extends Request {

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
			"name"              => "required | max:50",
			"fathers_name"      => "required | max:50",
			"mothers_name"      => "required | max:50",
			"schools_name"      => "required | max:70",
			"class"             => "required | numeric | between:5,12",
			"version"           => "required",
			"sroll"             => "required | numeric",
			"present_address"   => "required | max:300",
			"permanent_address" => "required | max:300", 
			"date_of_birth"     => "required | date",
		    'religion'			=> "required | max:20",
			"sex"               => "required",
			"phone"             => "required | numeric",
			"email"             => "email",
			"package"           => "required | numeric",
		];
	}

}
