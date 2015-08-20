<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageBlock extends Model {

	//
	protected $table = 'page_blocks';
	protected $fillable = array('page_id', 'block_id', 'status');

	public function page()
	{
		return $this->belongsTo('App\Page', 'id', 'page_id');
	}

	public function block()
	{
		return $this->belongsTo('App\Block', 'id', 'block_id');
	}
}
