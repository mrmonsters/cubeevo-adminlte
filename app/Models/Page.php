<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {

	//
	protected $table      = 'pages';
	protected $primaryKey = 'id';
	protected $fillable   = array('title', 'desc', 'slug', 'status');

	public function pageMenus()
	{
		return $this->hasMany('App\Models\PageMenu', 'page_id', 'id');
	}

	public function pageBlocks()
	{
		return $this->hasMany('App\Models\PageBlock', 'page_id', 'id');
	}

	public function pageContents()
	{
		return $this->hasMany('App\Models\PageContent', 'page_id', 'id');
	}
}
