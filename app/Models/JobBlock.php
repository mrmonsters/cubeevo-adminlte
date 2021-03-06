<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Translator\Translatable;
use Vinkla\Translator\Contracts\Translatable as TranslatableContract;

class JobBlock extends Model implements TranslatableContract {

	const TYPE_INTERN   = '1';
	const TYPE_FULLTIME = '2';

	use Translatable;

	protected $table                = 'job_blocks';
	protected $primaryKey           = 'id';
	protected $fillable             = ['title', 'desc', 'qualification', 'type', 'sort_order', 'status', 'delete'];
	protected $translator           = 'App\Models\JobBlockTranslation';
	protected $translatedAttributes = ['title', 'desc', 'qualification'];

	public function scopeIntern($query)
	{
		return $query->where('type', self::TYPE_INTERN);
	}

	public function scopeFulltime($query)
	{
		return $query->where('type', self::TYPE_FULLTIME);
	}

}
