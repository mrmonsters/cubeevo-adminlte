<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Translator\Translatable;
use Vinkla\Translator\Contracts\Translatable as TranslatableContract;

class Page extends Model implements TranslatableContract {

	//
	use Translatable;

	protected $table                = 'pages';
	protected $primaryKey           = 'id';
	protected $fillable             = ['name', 'desc', 'content', 'slug', 'status', 'meta_title', 'meta_keyword', 'meta_desc'];
	protected $translator           = 'App\Models\PageTranslation';
	protected $translatedAttributes = ['desc', 'content'];

	public function pageMenus()
	{
		return $this->hasMany('App\Models\PageMenu', 'page_id', 'id');
	}

	public function pageBlocks()
	{
		return $this->hasMany('App\Models\PageBlock', 'page_id', 'id');
	}

}
