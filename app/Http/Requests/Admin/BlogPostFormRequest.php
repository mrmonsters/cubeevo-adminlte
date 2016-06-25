<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class BlogPostFormRequest extends Request {

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
			'cover_image' => '',
			'fb_cover'    => '',
			'title'       => 'required',
			'description' => '',
			'sort_order'  => '',
		];
	}

}
