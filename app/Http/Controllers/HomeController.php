<?php namespace App\Http\Controllers;

use URL;
use Session;
use Redirect;
use Config;
use Validator;
use View;
use Mail;
use App\Models\Status;
use App\Models\Locale;
use App\Models\Page;
use App\Models\Category;
use App\Models\Post;
use App\Models\Project;
use App\Models\Solution;
use App\Models\Message;
use App\Models\Setting;
use App\Models\JobBlock;
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

		if ($page->slug == '/about-us')
		{
			$jobs = JobBlock::where('status', '=', Status::ACTIVE)
				->where('delete', false)
				->orderBy('sort_order')
				->get();

			$jobPosting = View::make('partials.frontend.job')->with('jobs', $jobs)
				->render();
			$page->translate(Session::get('locale'))->content = str_replace("@job__posting@", $jobPosting, $page->translate(Session::get('locale'))->content);
		}

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
 
		$meta_title = 'Our Design Portfolio';
		$meta_keyword = 'Corporate Identity, Branding, Marketing Strategy, Logo Design, Brochure Design, Flyer Design, Catalogue Design, Packaging Design, Web Design, eCommerce, Multimedia, Corporate Video, Explainer Video, Business Video, Booth Design, Menu Design, Billboard Design, Bunting &amp; Banner Design, Print Design, Digital Marketing, Character Design, Mascot Design, Advertising Agency, Branding Strategy, Advertising Planning, Broadcast Ad Planning, Graphic Design, Photography, Copywriting, Printing & Production';
		$meta_desc = 'Our creation, innovation, and motivation from ideas to execution, branding to websites, graphics to videos has generated better sales for our clients in Malaysia, and some in Singapore.';

		return view('frontend.credential')->with([
			'categories'=> $categories,
			'meta_title'=> $meta_title,
			'meta_keyword'=> $meta_keyword,
			'meta_desc'=> $meta_desc,
			]);
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
			->with('backbtn', url('/credential/'.$project->category->slug));
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

		$meta_title = 'At your Service';
		$meta_keyword = 'Corporate Identity, Branding, Marketing Strategy, Logo Design, Brochure Design, Flyer Design, Catalogue Design, Packaging Design, Web Design, eCommerce, Multimedia, Corporate Video, Explainer Video, Business Video, Booth Design, Menu Design, Billboard Design, Bunting &amp; Banner Design, Print Design, Digital Marketing, Character Design, Mascot Design, Advertising Agency';
		$meta_desc = 'At CUBEevo, we offer a one-stop solution service ranging from Branding Strategy, Advertising Planning, Broadcast Ad Planning, Packaging Design, Digital Marketing, Graphic Design, Web Design, Photography, Copywriting, Printing & Production.';

		return view('frontend.solution')->with([
			'solutions'=> $solutions,
			'meta_title'=> $meta_title,
			'meta_keyword'=> $meta_keyword,
			'meta_desc'=> $meta_desc,
			]);
	}

	public function getContactUs()
	{
		$meta_title = 'Contact Us';
		$meta_keyword = 'Contact Us';
		$meta_desc = 'Contact Us.';

		return view('frontend.contactus')->with([ 
			'meta_title'=> $meta_title,
			'meta_keyword'=> $meta_keyword,
			'meta_desc'=> $meta_desc,
			]);
	}

	public function getInsightdetail($slug)
	{
		if(empty($slug)):
			return Redirect::to('/insights/');
		endif;

		$post = Post::where('slug', '=', $slug)->first(); 

		$posts = Post::where('status', '=', Status::ACTIVE)->where('deleted', false)->where('slug','!=',$slug)
			->orderBy('created_at','desc') 
			->take(4)
			->get();

		return view('frontend.insightdetail')->with('post', $post)->with('posts', $posts)
			->with('backbtn', URL::action('HomeController@getInsights'));
	}

	public function getInsights()
	{
		$posts = Post::where('status', '=', Status::ACTIVE)->where('deleted', false)
			->orderBy('sort_order')
			->get();

		$meta_title = 'Insights';
		$meta_keyword = 'Insights';
		$meta_desc = 'Insights.';

		return view('frontend.insights')->with([ 
			'meta_title'=> $meta_title,
			'meta_keyword'=> $meta_keyword,
			'meta_desc'=> $meta_desc,
			'posts'	=> $posts
			]);
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
		$response = array();
		$data     = $req->input(); 
		if (isset($data) && !empty($data))
		{
			$rules = array(
				'name'    => 'required',
				'phone'   => 'required',
				'email'   => 'required',
				'subject' => 'required',
				'content' => 'required',
			);

			$validator = Validator::make($data, $rules);

			if ($validator->fails())
			{
				$msg = array();
				$messages = $validator->messages();
				foreach ($messages->all() as $message)
				{
					$msg[] = $message;
				}
				$response['code'] = Status::ERROR;
				$response['msg']  = implode(" | ", $msg);
			}
			else
			{
				$message = array();
				$message['name']    = $data['name'];
				$message['phone']   = $data['phone'];
				$message['email']   = $data['email'];
				$message['subject'] = $data['subject'];
				$message['content'] = $data['content'];
				$return = Message::create($message);

				$email   = Setting::where('code', '=', 'email')->first();
				$content = "FROM: ".$data['email']
					."\nNAME: ".$data['name']
					."\nPHONE: ".$data['phone']
					."\nSUBJECT: ".$data['subject']
					."\nCONTENT: ".$data['content'];
				/*
				$emailHeader = "From: enquire@cubeevo.com\n"
				   . "MIME-Version: 1.0\n"
				   . "Content-type: text/plain; charset=\"UTF-8\"\n"
				   . "Content-transfer-encoding: 8bit\n";
			    */

				if (isset($email) && isset($email->value) && $email->value != '')
				{
					//$result = mail($email->value, 'Cubeevo Enquiry', $content,$emailHeader);
					Mail::raw($content, function($message) use ($email)
					{
					    $message->from('server@cubeevo.com', 'Cubeevo Admin Panel');
					    $message->to($email->value)->subject('Cubeevo Enquiry');
					});
					$response['code'] = Status::SUCCESS;
					$response['msg']  = "Thank You for contacting us. We'll reply you within 2 working days";
				}
			}
		}
		else
		{
			$response['code'] = Status::ERROR;
			$response['msg']  = "Invalid parameters.";
		}

		return Redirect::back()->with('response', $response);
	}

}
