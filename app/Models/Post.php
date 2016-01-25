<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Translator\Translatable;
use Vinkla\Translator\Contracts\Translatable as TranslatableContract;

class Post extends Model implements TranslatableContract {

	use Translatable;

	// database
	protected $table      = 'posts';
	protected $primaryKey = 'id';
	protected $fillable   = ['title', 'description', 'file_id', 'status', 'deleted', 'sort_order'];

	// translatable
	protected $translator           = 'App\Models\PostTranslation';
	protected $translatedAttributes = ['title', 'description'];

	public function coverImage()
	{
		return $this->hasOne('App\Models\Files', 'id', 'file_id');
	}
}
