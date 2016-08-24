<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Translator\Translatable;
use Vinkla\Translator\Contracts\Translatable as TranslatableContract;

class Solution extends Model implements TranslatableContract {

	//
	use Translatable;

	protected $table                = 'solutions';
	protected $primaryKey           = 'id';
	protected $fillable             = ['link','name', 'desc', 'grid_img_id', 'grid_bg_img_id', 'pri_color_code', 'sort_order', 'status'];
	protected $translator           = 'App\Models\SolutionTranslation';
	protected $translatedAttributes = ['name', 'desc'];

	public function backgroundImage()
	{
		return $this->hasOne('App\Models\Files', 'id', 'grid_bg_img_id');
	}

	public function frontImage()
	{
		return $this->hasOne('App\Models\Files', 'id', 'grid_img_id');
	}

	public function translations()
	{
		return $this->hasMany('App\Models\SolutionTranslation', 'solution_id', 'id');
	}
}
