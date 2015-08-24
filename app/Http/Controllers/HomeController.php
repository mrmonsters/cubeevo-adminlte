<?php namespace App\Http\Controllers;

use Session;
use App\Models\Locale;
use App\Models\Page;
use App\Models\PageContent;
use App\Models\Files;
use App\Models\Entity;
use App\Models\EntityInstance;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Services\Retriever;

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
			Session::set('locale', 'cn');
		}
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index(Retriever $retriever)
	{
		$page     = Page::where('slug', '=', '/')->first();
		$content  = $page->pageContents()
			->where('locale_id', $retriever->getCurrentLocaleId())
			->first();

		return view('frontend.index')->with('content', $content);
	}

	public function getAboutUs(Retriever $retriever)
	{
		$page    = Page::where('slug', '=', '/about-us')->first();
		$content = $page->pageContents()
			->where('locale_id', $retriever->getCurrentLocaleId())
			->first();

		return view('frontend.aboutus')->with('content', $content);
	}

	public function getCredential(Retriever $retriever)
	{
		$codes =  array(
			'name',
			'img_id',
			'bg_img_id',
			'sort_order'
		);
		$categories = $retriever->getEntityCollection('category', $codes);

		return view('frontend.credential')->with('categories', $categories);
	}

	public function getCredentialContent()
	{
		return view('frontend.credential_content');
	}

	public function getSolution(Retriever $retriever)
	{
		$codes =  array(
			'name',
			'desc',
			'bg_color_code',
			'img_id',
			'bg_img_id',
			'sort_order'
		);
		$solutions = $retriever->getEntityCollection('solution', $codes);

		return view('frontend.solution')->with('solutions', $solutions);
	}

	public function getResearch()
	{
		return view('frontend.research');
	}

	public function getProcess(Retriever $retriever)
	{
		$page    = Page::where('slug', '=', '/process')->first();
		$content = $page->pageContents()
			->where('locale_id', $retriever->getCurrentLocaleId())
			->first();

		return view('frontend.process')->with('content', $content);
	}

	public function getContactUs()
	{
		return view('frontend.contactus');
	}

}
