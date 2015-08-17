<?php namespace App\Http\Controllers;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('frontend\index');
	}

	public function getAboutUs()
	{
		return view('frontend\aboutus');
	}

	public function getCredential()
	{
		return view('frontend\credential');
	}

	public function getCredentialContent()
	{
		return view('frontend\credential_content');
	}

	public function getSolution()
	{
		return view('frontend\solution');
	}

	public function getResearch()
	{
		return view('frontend\research');
	}

	public function getProcess()
	{
		return view('frontend\process');
	}

	public function getContactUs()
	{
		return view('frontend\contactus');
	}

}
