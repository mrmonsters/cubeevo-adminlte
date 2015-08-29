<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolutionTranslation extends Model {

	protected $fillable = ['solution_id', 'locale_id', 'name', 'desc'];
}