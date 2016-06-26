<?php namespace App\App\Models;

use App\Models\AbstractModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Vinkla\Translator\Contracts\Translatable;

class JobReviews extends AbstractModel implements Translatable {

	use \Vinkla\Translator\Translatable;
	use SoftDeletes;

	protected $table                = 'job_reviews';
	protected $primaryKey           = 'id';
	protected $fillable             = ['reviewer_id', 'status'];
	protected $dates                = ['deleted_at'];
	protected $translator           = 'App\Models\JobReviewTranslations';
	protected $translatedAttributes = ['question', 'answer'];

}
