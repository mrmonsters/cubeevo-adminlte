<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {

	//
	protected $table = 'menus';
	protected $primaryKey = 'menu_id';

	public function pageMenus()
	{
		return $this->hasMany('App\PageMenu', 'menu_id', 'menu_id');
	}
}
