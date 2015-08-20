<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageMenu extends Model {

	//
	protected $table = 'page_menus';

	public function page()
	{
		return $this->belongsTo('App\Models\Page', 'id', 'page_id');
	}

	public function menu()
	{
		return $this->belongsTo('App\Models\Menu', 'id', 'menu_id');
	}
}
