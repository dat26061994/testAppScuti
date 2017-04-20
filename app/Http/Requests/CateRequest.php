<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CateRequest extends Request {

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
			'txtCateName' => 'required|unique:cates,name|max:100',
			'txtDescription'	=>	'max:300'
		];
	}

	public function messages(){
		return [
			'txtCateName.required' => 'Please Enter The Cate Name !!',
			'txtCateName.unique' => 'Cate Name is exists !!',
			'txtCateName.max'	=>	'Cate Name is max 100 digits',
			'txtDescription.max' => 'Description is max 300 digits'
		];
	}

}
