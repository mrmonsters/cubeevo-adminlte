<?php namespace App\Http\Controllers;

use URL;
use Session;
use Redirect;
use Config;
use App\Models\Status;
use App\Models\Locale;
use App\Models\Page;
use App\Models\Category;
use App\Models\Project;
use App\Models\Solution;
use App\Models\Message;
use App\Models\Setting;
use Illuminate\Http\Request;

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
			Session::set('locale', 'en');
		}

		return parent::__construct();
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function getStaticPages($slug)
	{	 
		$slug = ($slug == '/')?$slug:'/'.$slug; 
		$page = Page::where('slug', '=', $slug)->where('status', Status::ACTIVE)
			->where('delete', false)
			->first();   

		if(!$page): 
			$page = Page::where('slug', '=', '/')->where('status', Status::ACTIVE)
			->where('delete', false)
			->first();   
		endif;

		$meta_title = $page->meta_title;
		$meta_keyword = $page->meta_keyword;
		$meta_desc = $page->meta_desc;

		return view('frontend.index')->with([
			'page'=> $page,
			'meta_title'=> $meta_title,
			'meta_keyword'=> $meta_keyword,
			'meta_desc'=> $meta_desc,
			]);
	} 

	public function getCredential()
	{
		$categories = Category::where('status', '=', Status::ACTIVE)->where('delete', false)
			->orderBy('sort_order')
			->get();

		return view('frontend.credential')->with('categories', $categories);
	}

	public function getProjectContent($slug)
	{
		if(empty($slug)):
			return Redirect::to('/credential/');
		endif;
		
		$project = Project::where('slug', '=', $slug)->where('status', Status::ACTIVE)
			->where('delete', false)
			->first();
		if($project == null){
			return Redirect::to('/');
		}

		return view('frontend.project_content')->with('project', $project)
			->with('backbtn', URL::previous());
	}

	public function getCredentialProject($slug)
	{
		if(empty($slug)):
			return Redirect::to('/credential/');
		endif;

		$projects = Category::where('slug', '=', $slug)->first()
			->projects()
			->where('status', Status::ACTIVE)
			->where('delete', false)
			->orderBy('sort_order')
			->get();

		return view('frontend.project')->with('projects', $projects)
			->with('backbtn', URL::action('HomeController@getCredential'));
	}

	public function getSolution()
	{
		$solutions = Solution::where('status', '=', Status::ACTIVE)->where('delete', false)
			->orderBy('sort_order')
			->get();

		return view('frontend.solution')->with('solutions', $solutions);
	}

	public function getContactUs()
	{
		return view('frontend.contactus');
	}

	public function switchLocale($code)
	{
		if(empty($code)):
			return Redirect::to('/');
		endif;

		$locale = Locale::where('language', '=', $code)->where('status', Status::ACTIVE)
			->where('delete', false)
			->first();

		if (isset($locale))
		{
			Session::set('locale', $locale->language);
		}

		return Redirect::back();
	}

	public function submitMessage(Request $req)
	{
		$data = $req->input(); 
		if (isset($data) && !empty($data))
		{
			$message = array();
			$message['name']    = $data['name'];
			$message['phone']   = $data['phone'];
			$message['email']   = $data['email'];
			$message['subject'] = $data['subject'];
			$message['content'] = $data['content'];
			$return = Message::create($message);

			$email = Setting::where('code', '=', 'email')->first();

			if (isset($email) && isset($email->value) && $email->value != '')
			{
				$result = mail($email->value, $data['subject'], $data['content']);
				return Redirect::back();
			}
		}
	}

}
