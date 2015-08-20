<?php namespace App\Http\Controllers;

use Session;
use App\Models\Page;
use App\Models\PageContent;
use App\Models\Category;
use App\Models\Files;

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
	public function __construct()
	{
		// Set default language
		if (Session::get('locale') == null)
		{
			Session::set('locale', 'zh-cn');
		}
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$page     = Page::where('slug', '=', '/')->first();
		$content  = $page->pageContents()
			->where('locale', Session::get('locale'))
			->first();

		return view('frontend.index')->with('content', $content);
	}

	public function getAboutUs()
	{
		$page = Page::where('slug', '=', '/about-us')->first();
		$content = $page->pageContents()
			->where('locale', Session::get('locale'))
			->first();

		return view('frontend.aboutus')->with('content', $content);
	}

	public function getCredential()
	{
		$categories = Category::where('status', '=', '2')->get()
			->sortBy('sort_order');

		return view('frontend\credential')->with('categories', $categories);
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
		$page = Page::where('slug', '=', '/process')->first();
		$content = $page->pageContents()
			->where('locale', Session::get('locale'))
			->first();

		return view('frontend.process')->with('content', $content);
	}

	public function getContactUs()
	{
		return view('frontend\contactus');
	}

}
