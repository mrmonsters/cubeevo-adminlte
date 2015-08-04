<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {

	//
	protected $table = 'pages';

	public function pageMenus()
	{
		return $this->hasMany('App\PageMenu', 'page_id', 'page_id');
	}

	public function pageSections()
	{
		return $this->hasMany('App\PageSection', 'page_id', 'page_id');
	}
}
