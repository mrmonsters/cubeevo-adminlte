<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntityInstance extends Model {

	//
	protected $table = 'entity_instances';
	protected $fillable = array('entity_id', 'status');

	public function entity()
	{
		return $this->belongsTo('App\Models\Entity', 'id', 'entity_id');
	}

	public function attributeValues()
	{
		return $this->hasMany('App\Models\AttributeValue', 'entity_instance_id', 'id');
	}
	
}
