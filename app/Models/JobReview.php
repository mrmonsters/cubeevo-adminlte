<?php namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class JobReview extends AbstractModel {

	const LOCALE_EN = 0; // english
	const LOCALE_ZH = 1; // chinese (cn)

	use SoftDeletes;

	protected $table      = 'job_reviews';
	protected $primaryKey = 'id';
	protected $fillable   = ['reviewer_id', 'question', 'answer', 'locale', 'sort', 'status'];
	protected $dates      = ['deleted_at'];

}
