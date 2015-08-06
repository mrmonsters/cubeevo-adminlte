<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model {

	//
	protected $table = 'sections';
	protected $primaryKey = 'section_id';

	public function pageSections()
	{
		return $this->hasMany('App\PageSection', 'section_id', 'section_id');
	}
}
