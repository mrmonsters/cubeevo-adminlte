<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Translator\Translatable;
use Vinkla\Translator\Contracts\Translatable as TranslatableContract;

class JobBlock extends Model implements TranslatableContract {

	//
	use Translatable;

	protected $table                = 'job_blocks';
	protected $primaryKey           = 'id';
	protected $fillable             = ['title', 'desc', 'qualification', 'sort_order', 'status', 'delete'];
	protected $translator           = 'App\Models\JobBlockTranslation';
	protected $translatedAttributes = ['title', 'desc', 'qualification'];

}
