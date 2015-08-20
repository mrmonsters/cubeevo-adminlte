<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model {

	//
	protected $table = 'project_categories';

	public function project()
	{
		return $this->belongsTo('App\Models\Project', 'id', 'project_id');
	}

	public function category()
	{
		return $this->belongsTo('App\Models\Category', 'id', 'category_id');
	}
}
