<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

	//
	protected $table = 'projects';

	public function projectCategories()
	{
		return $this->hasMany('App\Models\ProjectCategory', 'project_id', 'id');
	}

	public function projectFiles()
	{
		return $this->hasMany('App\Models\ProjectFile', 'project_id', 'id');
	}
}
