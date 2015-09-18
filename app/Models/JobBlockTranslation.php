<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobBlockTranslation extends Model {

	protected $table    = 'job_block_translations';
	protected $fillable = ['job_block_id', 'locale_id', 'title', 'desc', 'qualification'];
}