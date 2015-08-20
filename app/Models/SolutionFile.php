<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolutionFile extends Model {

	//
	protected $table = 'solution_files';

	public function project()
	{
		return $this->belongsTo('App\Models\Solution', 'id', 'solution_id');
	}

	public function File()
	{
		return $this->belongsTo('App\Models\Files', 'id', 'file_id');
	}
}
