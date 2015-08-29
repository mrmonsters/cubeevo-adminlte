<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectFile extends Model {

	//
	protected $table      = 'project_files';
	protected $primaryKey = 'id';
	protected $fillable   = ['project_id', 'img_id', 'sort_order', 'status'];

	public function project()
	{
		return $this->belongsTo('App\Models\Project');
	}

	public function image()
	{
		return $this->belongsTo('App\Models\Files', 'img_id', 'id');
	}
	
}
