<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model {

	//
	protected $table = 'sections';

	public function pageSections()
	{
		return $this->hasMany('App\PageSection', 'section_id', 'section_id');
	}
}
