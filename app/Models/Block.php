<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model {

	//
	protected $table = 'blocks';

	public function pageBlocks()
	{
		return $this->hasMany('App\PageBlock', 'block_id', 'id');
	}
}
