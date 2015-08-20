<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	//
	protected $table = 'categories';
	protected $fillable = array('name', 'desc', 'sort_order', 'status');

	public function categorizedProjects()
	{
		return $this->hasMany('App\Models\ProjectCategory', 'category_id', 'id');
	}

	public function image()
	{
		return $this->hasOne('App\Models\Files', 'id', 'file_id');
	}
}
