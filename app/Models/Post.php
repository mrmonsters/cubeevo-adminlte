<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Translator\Translatable;
use Vinkla\Translator\Contracts\Translatable as TranslatableContract;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Post extends Model implements TranslatableContract, SluggableInterface {

	use Translatable;
	use SluggableTrait;

	// database
	protected $table      = 'posts';
	protected $primaryKey = 'id';
	protected $fillable   = ['title', 'description', 'file_id', 'status', 'deleted', 'sort_order'];

	// translatable
	protected $translator           = 'App\Models\PostTranslation';
	protected $translatedAttributes = ['title', 'description'];

	// sluggable
	protected $sluggable = ['build_from' => 'custom_slug', 'save_to' => 'slug'];

	public function getCustomSlugAttribute()
	{
		return $this->translate('en')->title;
	}

	public function coverImage()
	{
		return $this->hasOne('App\Models\Files', 'id', 'file_id');
	}
}
