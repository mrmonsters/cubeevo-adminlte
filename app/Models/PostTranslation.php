<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model {

	protected $fillable = ['post_id', 'locale_id', 'title', 'description'];
}