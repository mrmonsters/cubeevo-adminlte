<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntityChild extends Model {

	//
	protected $table = 'entity_children';
	protected $fillable = array('parent_id', 'child_id', 'status');

	public function instanceParent()
	{
		return $this->belongsTo('App\Models\EntityInstance', 'id', 'parent_id');
	}

	
}
