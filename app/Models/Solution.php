<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model {

	//
	protected $table = 'solutions';

	public function solutionFiles()
	{
		return $this->hasMany('App\Models\SolutionFile', 'solution_id', 'id');
	}

}
