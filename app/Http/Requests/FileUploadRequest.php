<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Http\Requests\FileRequest;

class FileUploadRequest extends FileRequest {

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
			'file' => 'max:2048 | mimes:jpeg,gif,png,doc,docx,ppt,pptx,pps,ppsx,pdf'
		];
	}

}
