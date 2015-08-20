<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	//
	protected $table = 'categories';

	public function categorizedProjects()
	{
		return $this->hasMany('App\Models\ProjectCategory', 'category_id', 'id');
	}
}
