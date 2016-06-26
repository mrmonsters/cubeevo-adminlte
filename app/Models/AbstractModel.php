<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractModel extends Model {

	public function scopeActive($query)
	{
		return $query->where('status', Status::ACTIVE);
	}

}
