<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectTranslation extends Model {

	protected $fillable = ['project_id', 'locale_id', 'name', 'desc', 'founder', 'client_name'];
}