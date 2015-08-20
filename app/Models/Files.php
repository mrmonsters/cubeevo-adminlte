<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Files extends Model {

	//
	protected $table = 'files';
	protected $fillable = array('name', 'type', 'dir', 'size', 'status');

	public function categories()
	{
		return $this->belongsToMany('App\Models\Category');
	}
}
