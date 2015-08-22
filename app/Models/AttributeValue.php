<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model {

	//
	protected $table = 'attribute_values';
	protected $fillable = array('attribute_id', 'entity_instance_id', 'locale_id', 'value', 'status');

	public function attribute()
	{
		return $this->belongsTo('App\Models\Attribute');
	}

	public function entityInstance()
	{
		return $this->belongsTo('App\Models\EntityInstance');
	}
	
}
