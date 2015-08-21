<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model {

	//
	protected $table = 'entities';
	protected $fillable = array('name', 'code', 'status');

	public function entityInstances()
	{
		return $this->hasMany('App\Models\EntityInstance', 'entity_id', 'id');
	}
	
}
