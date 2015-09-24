<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Translator\Translatable;
use Vinkla\Translator\Contracts\Translatable as TranslatableContract;

class ProfileBlock extends Model implements TranslatableContract {

	//
	use Translatable;

	protected $table                = 'profile_blocks';
	protected $primaryKey           = 'id';
	protected $fillable             = ['name', 'img_dir', 'title', 'desc', 'sort_order', 'status', 'delete'];
	protected $translator           = 'App\Models\ProfileBlockTranslation';
	protected $translatedAttributes = ['title', 'desc'];

}
