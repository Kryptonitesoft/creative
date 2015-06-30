<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PasswordRequest extends Request {

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
			'old_password'       => 'required',
			'new_password'       => 'required | same:again_new_password',
			'again_new_password' => 'required'
		];
	}

}
