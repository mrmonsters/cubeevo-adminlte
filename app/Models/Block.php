<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model {

	//
	protected $table = 'blocks';
	protected $fillable = ['project_id', 'type', 'value', 'sort_order', 'status', 'delete'];

	const IMAGE   = 'img';
	const VIDEO   = 'vid';
	const GALLERY = 'gal';

	public function project()
	{
		return $this->belongsTo('App\Models\Project');
	}
}
