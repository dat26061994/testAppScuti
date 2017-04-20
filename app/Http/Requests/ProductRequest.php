<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request {

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
			
			'txtName' =>	'required|unique:products,name|max:100',
			'txtPrice'	=> 'required|integer|max:10000000000',
			'fImages'	=> 'required|mimes:jpeg,jpg,png,gif|max:10240'


		];
	}

	public function messages(){
		return[
			
			'txtName.required' => 'Please Enter The Product Name',
			'txtName.unique'	=>	'Product Name is exists!!',
			'txtName.max'	=>	'The Product Name max is 100 digits',
			'txtPrice.required'	=> 'Please enter the the product price !!',
			'txtPrice.integer' =>	'The Price must number!!',
			'txtPrice.max'	=>	'The Price max is 10 digits',
			'fImages.required'	=>	'The Product Images is not null',
			'fImages.mimes'	=> 'The Images not in proper format!!',
			'fImages.max'	=> 'The size Images is to 10 MB'
		];	
	}

}
