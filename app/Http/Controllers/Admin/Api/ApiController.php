<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;

abstract class ApiController extends Controller
{

	protected $transformation;

	protected abstract function transform(array $item);

	protected function transformCollection(array $collection)
	{
		return array_map(array($this, $this->transformation), $collection);
	}

	public function __construct()
	{
		$this->transformation = "transform";
	}

}
