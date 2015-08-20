<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model {

	//
	protected $table      = 'page_contents';
	protected $primaryKey = 'id';
	protected $fillable   = array('page_id', 'title', 'desc', 'content', 'locale', 'status');

	public function page()
	{
		return $this->belongsTo('App\Models\Page', 'id', 'page_id');
	}

}
