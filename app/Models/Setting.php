<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {

	//
	const USER = 'user';
	const SITE = 'site';

	protected $table    = 'settings';
	protected $fillable = ['name', 'code', 'value'];

	public static function getMetaImage()
	{
		if ($imgId = self::where('code', '=', 'meta_img_id')->first()) {

			return Files::find($imgId->value);
		}

		return false;
	}

}
