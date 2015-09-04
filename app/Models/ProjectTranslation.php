<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectTranslation extends Model {

	protected $fillable = ['project_id', 'locale_id', 'name', 'client_name', 'background', 'challenge', 'result', 'subheading'];
}