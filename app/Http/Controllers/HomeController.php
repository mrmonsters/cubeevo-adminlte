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
		$codes =  array(
			'name',
			'img_id',
			'bg_img_id',
			'sort_order'
		);
		$categories = $this->_getEntityCollection('category', $codes);

		return view('frontend.credential')->with('categories', $categories);
	}

	public function getCredentialContent()
	{
		return view('frontend\credential_content');
	}

	public function getSolution()
	{
		$codes =  array(
			'name',
			'desc',
			'bg_color_code',
			'img_id',
			'bg_img_id',
			'sort_order'
		);
		$solutions = $this->_getEntityCollection('solution', $codes);

		return view('frontend.solution')->with('solutions', $solutions);
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

	protected function _getEntityCollection($entityCode, $attributeCodes)
	{
		$entities = array();
		$collection = Entity::where('code', '=', $entityCode)->first()
			->entityInstances()
			->get();

		foreach ($collection as $item)
		{
			$entity = array();

			foreach ($attributeCodes as $code)
			{
				$entity[$code] = $this->_getAttribute($code, $item);
			}

			$entities[] = $entity;
		}

		if (!empty($entities) && isset($entities[0]['sort_order']))
		{
			uasort($entities, array($this, 'cmp'));
		}

		return $entities;
	}

	protected function _getAttribute($code, $item)
	{
		$locale    = Locale::where('code', '=', Session::get('locale'))->first();
		$attribute = Attribute::where('code', '=', $code)->first();
		$value     = $item->attributeValues()
			->where('attribute_id', $attribute->id)
			->first();

		if (isset($value->locale_id))
		{
			$value = $item->attributeValues()
				->where('attribute_id', $attribute->id)
				->where('locale_id', $locale->id)
				->first();
		}
		
		return (isset($value)) ? $value->value : '';
	}

	static function cmp($x, $y)
	{
		return (intval($x['sort_order']) > intval($y['sort_order'])) ? 1 : -1;	
	}

}
