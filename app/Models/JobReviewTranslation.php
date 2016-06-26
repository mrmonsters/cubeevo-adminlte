<?php namespace App\Models;

class JobReviewTranslation extends AbstractModel {

	protected $table    = 'job_review_translations';
	protected $fillable = ['job_review_id', 'locale_id', 'question', 'answer'];

}
