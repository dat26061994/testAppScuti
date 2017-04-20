<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class StudentRequest extends Request {

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
			'txtName' =>'required|unique:student,name',
            'txtPhone' =>'required|unique:student,sdt',
            'txtEmail' =>'required|unique:student,email',
            'txtGender' =>'required',
            'txtCountry' =>'required',
            'Fimages'    =>'required|image|max:200'
		];
	}

	public function messages(){
		return [
		 'txtName.required'=>'Vui Lòng Nhập Họ Tên',
             'txtPhone.required'=>'Vui Lòng Nhập Số Điện Thoại',
             'txtEmail.required'=>'Vui Lòng Nhập Email',
             'txtGender.required'=>'Vui Lòng Nhập Giới Tính',
             'txtCountry.required'=>'Vui Lòng Nhập Địa Chỉ'
		];
	}

}
