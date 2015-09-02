<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Translator\Translatable;
use Vinkla\Translator\Contracts\Translatable as TranslatableContract;

class Project extends Model implements TranslatableContract {

	//
	use Translatable;

	protected $table                = 'projects';
	protected $primaryKey           = 'id';
	protected $fillable             = ['name', 'background', 'challenge', 'result', 'sub_heading', 'client_name', 'web_link', 'grid_img_id', 'grid_bg_img_id', 'brand_img_id', 'pri_color_code', 'sec_color_code', 'txt_color_code', 'year', 'sort_order', 'status'];
	protected $translator           = 'App\Models\ProjectTranslation';
	protected $translatedAttributes = ['name', 'background', 'challenge', 'result', 'sub_heading', 'client_name'];

	public function backgroundImage()
	{
		return $this->hasOne('App\Models\Files', 'id', 'grid_bg_img_id');
	}

	public function frontImage()
	{
		return $this->hasOne('App\Models\Files', 'id', 'grid_img_id');
	}

	public function brandImage()
	{
		return $this->hasOne('App\Models\Files', 'id', 'brand_img_id');
	}

	public function projectImages()
	{
		return $this->hasMany('App\Models\ProjectFile', 'project_id', 'id');
	}

	public function translations()
	{
		return $this->hasMany('App\Models\ProjectTranslation', 'project_id', 'id');
	}

	public function blocks()
	{
		return $this->hasMany('App\Models\Block', 'project_id', 'id');
	}

}
