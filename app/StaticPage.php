<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model {

	//
	protected $table = 'static_pages';

	public function pageMenus()
	{
		return $this->hasMany('App\PageMenu', 'page_id', 'page_id');
	}
}
