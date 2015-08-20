<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectFile extends Model {

	//
	protected $table = 'project_files';

	public function project()
	{
		return $this->belongsTo('App\Models\Project', 'id', 'project_id');
	}

	public function file()
	{
		return $this->belongsTo('App\Models\Files', 'id', 'file_id');
	}
}
