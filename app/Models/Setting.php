<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {

	//
	const USER = 'user';
	const SITE = 'site';

	protected $table    = 'settings';
	protected $fillable = ['name', 'code', 'value'];

}
