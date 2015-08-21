<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model {

	//
	protected $table = 'attributes';
	protected $fillable = array('name', 'code', 'type', 'sort_order', 'status');

	public function values()
	{
		return $this->hasMany('App\Models\AttributeValue', 'attribute_id', 'id');
	}
	
}
