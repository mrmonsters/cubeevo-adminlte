<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use View; 
use App\Models\Setting;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

	public function __construct()
	{
		// Set default language
		/*
		if (Session::get('locale') == null)
		{
			Session::set('locale', 'cn');
		}
		*/ 
        // Build our navigation
        $site_settings = Setting::all(); 

        View::share('site_settings', $site_settings);  
	}

	public function respondError($url = '/', $message = 'Unable to process your request. Please try again.')
	{
		return redirect($url)->with('response', [
			'code' => 0,
			'msg'  => $message,
		]);
	}

	public function respondSuccess($url = '/', $message = null)
	{
		return redirect($url)->with('response', [
			'code' => 1,
			'msg'  => $message,
		]);
	}

}
