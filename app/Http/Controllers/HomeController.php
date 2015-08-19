<?php namespace App\Http\Controllers;

use App\Page;
use App\Section;

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
		$sections = array();
		$page = Page::where('page_slug', '=', '/')->first();
		$secs = $page->pageSections()->get();

		foreach ($secs as $sec)
		{
			$item = $sec->section()->first();
			$sections[] = $item;
		}

		return view('frontend\index')->with('sections', $sections);
	}

	public function getAboutUs()
	{
		$page = Page::where('page_slug', '=', '/about-us')->first();

		return view('frontend\aboutus')->with('page', $page);
	}

	public function getCredential()
	{
		$sections = array();
		$page = Page::where('page_slug', '=', '/credential')->first();
		$secs = $page->pageSections()->get();

		foreach ($secs as $sec)
		{
			$item = $sec->section()->first();
			$sections[] = $item;
		}

		return view('frontend\credential')->with('sections', $sections);
	}

	public function getCredentialContent()
	{
		return view('frontend\credential_content');
	}

	public function getSolution()
	{
		$sections = array();
		$page = Page::where('page_slug', '=', '/solution')->first();
		$secs = $page->pageSections()->get();

		foreach ($secs as $sec)
		{
			$item = $sec->section()->first();
			$sections[] = $item;
		}

		return view('frontend\solution')->with('sections', $sections);
	}

	public function getResearch()
	{
		return view('frontend\research');
	}

	public function getProcess()
	{
		$page = Page::where('page_slug', '=', '/process')->first();

		return view('frontend\process')->with('page', $page);
	}

	public function getContactUs()
	{
		return view('frontend\contactus');
	}

}
