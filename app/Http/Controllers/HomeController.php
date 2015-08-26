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
use App\Services\GeneralHelper;
use App\Services\CategoryHelper;

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
	public function index(GeneralHelper $genHelper)
	{
		$page     = Page::where('slug', '=', '/')->first();
		$content  = $page->pageContents()
			->where('locale_id', $genHelper->getCurrentLocaleId())
			->first();

		return view('frontend.index')->with('content', $content);
	}

	public function getAboutUs(GeneralHelper $genHelper)
	{
		$page    = Page::where('slug', '=', '/about-us')->first();
		$content = $page->pageContents()
			->where('locale_id', $genHelper->getCurrentLocaleId())
			->first();

		return view('frontend.aboutus')->with('content', $content);
	}

	public function getCredential(GeneralHelper $genHelper)
	{
		$codes =  array(
			'name',
			'img_id',
			'bg_img_id',
			'sort_order'
		);
		$categories = $genHelper->getEntityCollection('category', $codes);

		return view('frontend.credential')->with('categories', $categories);
	}

	public function getProjectContent()
	{
		return view('frontend.credential_content');
	}

	public function getCredentialProject($categoryId, CategoryHelper $catHelper)
	{
		$codes = array(
			'name',
			'img_id',
			'bg_img_id',
			'sort_order'
		);
		$projects = $catHelper->getCategoryProject($categoryId, $codes);

		return view('frontend.project')->with('projects', $projects);
	}

	public function getSolution(GeneralHelper $genHelper)
	{
		$codes =  array(
			'name',
			'desc',
			'bg_color_code',
			'img_id',
			'bg_img_id',
			'sort_order'
		);
		$solutions = $genHelper->getEntityCollection('solution', $codes);

		return view('frontend.solution')->with('solutions', $solutions);
	}

	public function getResearch()
	{
		return view('frontend.research');
	}

	public function getProcess(GeneralHelper $genHelper)
	{
		$page    = Page::where('slug', '=', '/process')->first();
		$content = $page->pageContents()
			->where('locale_id', $genHelper->getCurrentLocaleId())
			->first();

		return view('frontend.process')->with('content', $content);
	}

	public function getContactUs()
	{
		return view('frontend.contactus');
	}

}
