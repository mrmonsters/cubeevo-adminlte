<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class SettingFormRequest extends Request {

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
			'ga_key'           => '',
			'gmaps_lat'        => '',
			'gmaps_lng'        => '',
			'address'          => '',
			'phone'            => '',
			'fax'              => '',
			'email'            => '',
			'facebook_link'    => '',
			'youtube_link'     => '',
			'instagram_link'   => '',
			'twitter_link'     => '',
			'google_plus_link' => '',
			'site_title'       => '',
			'meta_keyword'     => '',
			'meta_desc'        => '',
			'meta_img_id'      => '',
		];
	}

}
