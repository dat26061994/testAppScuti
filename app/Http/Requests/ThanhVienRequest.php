<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ThanhVienRequest extends Request {

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
			'user' =>'required',
			'pass' =>'required'
		];
	}

	public function messages(){
		return [
         'user.required' => 'Vui Lòng nhập User',
         'pass.required' =>'Vui Lòng nhập Password'
		];
	}

}
