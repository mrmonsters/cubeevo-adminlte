<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Translator\Translatable;
use Vinkla\Translator\Contracts\Translatable as TranslatableContract;

class Category extends Model implements TranslatableContract {

	//
	use Translatable;

	protected $table                = 'categories';
	protected $primaryKey           = 'id';
	protected $fillable             = ['name', 'desc', 'grid_img_id', 'grid_bg_img_id', 'sort_order', 'status'];
	protected $translator           = 'App\Models\CategoryTranslation';
	protected $translatedAttributes = ['name', 'desc'];

	public function backgroundImage()
	{
		return $this->hasOne('App\Models\Files', 'id', 'grid_bg_img_id');
	}

	public function frontImage()
	{
		return $this->hasOne('App\Models\Files', 'id', 'grid_img_id');
	}

	public function projects()
	{
		return $this->hasMany('App\Models\Project', 'category_id', 'id');
	}

	public function translations()
	{
		return $this->hasMany('App\Models\CategoryTranslation', 'category_id', 'id');
	}

}
