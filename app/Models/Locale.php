<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locale extends Model {

	//
	protected $table = 'locales';
	protected $fillable = array('name', 'code', 'status');
	
	public function attributeValues()
	{
		return $this->hasMany('App\Models\AttributeValue', 'locale_id', 'id');
	}
}
