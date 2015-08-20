<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {

	//
	protected $table = 'menus';
	protected $primaryKey = 'id';

	public function pageMenus()
	{
		return $this->hasMany('App\PageMenu', 'menu_id', 'id');
	}
}
