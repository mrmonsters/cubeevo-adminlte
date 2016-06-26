<?php namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class JobReviewer extends AbstractModel {

	CONST TYPE_INTERN   = '1';
	CONST TYPE_FULLTIME = '2';

	use SoftDeletes;

	protected $table      = 'job_reviewers';
	protected $primaryKey = 'id';
	protected $fillable   = ['name', 'qualification', 'type', 'date', 'status'];
	protected $dates      = ['deleted_at'];

	public function scopeIntern($query)
	{
		return $query->where('type', self::TYPE_INTERN);
	}

	public function scopeFulltime($query)
	{
		return $query->where('type', self::TYPE_FULLTIME);
	}

	public function reviews()
	{
		return $this->hasMany('App\Models\JobReview', 'reviewer_id', 'id');
	}

}
