<?php namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Vinkla\Translator\Contracts\Translatable;

class JobReview extends AbstractModel implements Translatable {

	use \Vinkla\Translator\Translatable;
	use SoftDeletes;

	protected $table                = 'job_reviews';
	protected $primaryKey           = 'id';
	protected $fillable             = ['reviewer_id', 'sort', 'status'];
	protected $dates                = ['deleted_at'];
	protected $translator           = 'App\Models\JobReviewTranslations';
	protected $translatedAttributes = ['question', 'answer'];

}
