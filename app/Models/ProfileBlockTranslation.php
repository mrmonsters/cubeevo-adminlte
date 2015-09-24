<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileBlockTranslation extends Model {

	protected $table    = 'profile_block_translations';
	protected $fillable = ['profile_block_id', 'locale_id', 'title', 'desc'];
}