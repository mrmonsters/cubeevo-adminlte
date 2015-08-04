<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PageSection extends Model {

	//
	protected $table = 'page_sections';

	public function page()
	{
		return $this->belongsTo('App\Page', 'page_id', 'page_id');
	}

	public function section()
	{
		return $this->belongsTo('App\Section', 'section_id', 'section_id');
	}
}
