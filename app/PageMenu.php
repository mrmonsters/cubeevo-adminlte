<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PageMenu extends Model {

	//
	protected $table = 'page_menus';

	public function page()
	{
		return $this->belongsTo('App\Page', 'page_id', 'page_id');
	}

	public function menu()
	{
		return $this->belongsTo('App\Menu', 'menu_id', 'menu_id');
	}
}
