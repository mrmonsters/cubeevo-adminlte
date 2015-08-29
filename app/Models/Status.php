<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model {

	//
	const ACTIVE   = '2';
	const INACTIVE = '1';
	const SUCCESS  = '1';
	const ERROR    = '0';
}
