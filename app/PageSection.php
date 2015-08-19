<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PageSection extends Model {

	//
	protected $table = 'page_sections';
	protected $fillable = array('page_id', 'section_id', 'status');

	public function page()
	{
		return $this->belongsTo('App\Page', 'page_id', 'page_id');
	}

	public function section()
	{
		return $this->belongsTo('App\Section', 'section_id', 'section_id');
	}
}
