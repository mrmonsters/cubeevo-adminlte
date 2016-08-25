<?php namespace App\Http\Controllers;

use App\Models\JobReviewer;
use Illuminate\Support\Facades\App;
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

		App::setLocale(Session::get('locale'));

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

	public function getVisualBranding()
	{
		$meta_title = 'Visual Branding';
		$meta_keyword = 'Visual Branding';
		$meta_desc = 'Visual Branding';

		return view('frontend.visual-branding')->with([
			'meta_title'=> $meta_title,
			'meta_keyword'=> $meta_keyword,
			'meta_desc'=> $meta_desc,
			'backbtn' => url('/')
		]);
	}
	public function getThematicCampaign()
	{
		$meta_title = 'Thematic Campaign';
		$meta_keyword = 'Thematic Campaign';
		$meta_desc = 'Thematic Campaign';

		return view('frontend.thematic-campaign')->with([
			'meta_title'=> $meta_title,
			'meta_keyword'=> $meta_keyword,
			'meta_desc'=> $meta_desc,
			'backbtn' => url('/')
		]);
	}
	public function getOnlineDigitalPlatform()
	{
		$meta_title = 'Online Digital Platform';
		$meta_keyword = 'Online Digital Platform';
		$meta_desc = 'Online Digital Platform';

		return view('frontend.online-digital-platform')->with([
			'meta_title'=> $meta_title,
			'meta_keyword'=> $meta_keyword,
			'meta_desc'=> $meta_desc,
			'backbtn' => url('/')
		]);
	}
	public function getExplainerVideoProduction()
	{
		$meta_title = 'Explainer Video Production';
		$meta_keyword = 'Explainer Video Production';
		$meta_desc = 'Explainer Video Production';

		return view('frontend.explainer-video-production')->with([
			'meta_title'=> $meta_title,
			'meta_keyword'=> $meta_keyword,
			'meta_desc'=> $meta_desc,
			'backbtn' => url('/')
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
		if (empty($slug)) {

			return redirect()->to('/credential/');
		}

		$project = Project::where('slug', '=', $slug)
			->where('status', Status::ACTIVE)
			->where('delete', false)
			->first();

		if (!$project){

			return redirect()->to('/');
		}

		$count = $project->category
			->projects()
			->where('status', '=', 2)
			->count();

		if ($count < 2) {

			$backbtn = url('/credential');
		} else {

			$backbtn = url('/credential/' . $project->category->slug);
		}

		$similarProjects = $project->category->projects()
			->where('status', Status::ACTIVE)
			->where('id', '!=', $project->id)
			->get();
		$categories    = Category::where('status', '=', Status::ACTIVE)
			->where('delete', false)
			->where('id', '!=', $project->category->id)
			->where('sort_order', '>=', $project->category->sort_order)
			->orderBy('sort_order')
			->take(2)
			->get();

		$this->_pushCategoryProjectsToCollection($similarProjects, $categories); // first attempt

		if ($similarProjects->count() < 2) {

			$categories = Category::where('status', '=', Status::ACTIVE)
				->where('delete', false)
				->where('id', '!=', $project->category->id)
				->orderBy('sort_order')
				->take(2)
				->get();

			$this->_pushCategoryProjectsToCollection($similarProjects, $categories); // second attempt
		}

		return view('frontend.project_content')->with(compact('project', 'backbtn', 'similarProjects'));
	}

	protected function _pushCategoryProjectsToCollection(&$collection, $categories) {

		foreach ($categories as $category) {

			foreach ($category->activeProjects as $item) {

				if ($collection->count() < 2) {

					$collection->push($item);
				}
			}
		}
	}

	public function getHomepage()
	{
		$meta_title = 'Advertising Agency Malaysia | Creative Agency Malaysia | Branding Agency Malaysia | Design Agency Malaysia';
		$meta_keyword = 'Advertising Agency, Design Agency, Creative Agency, Branding Agency, Corporate Identity, Branding Strategy, Marketing Strategy, Logo Design, Brochure Design, Flyer Design, Catalogue Design, Packaging Design, Unique Web Design, Multimedia, Corporate Video,';
		$meta_desc = "We're CUBEevo, a Creative Agency in Malaysia & Singapore - giving brands a complete transformation.  Are you ready to transform? Let’s talk How!";

		return view('frontend.homepage.index')->with([
			'meta_title'=> $meta_title,
			'meta_keyword'=> $meta_keyword,
			'meta_desc'=> $meta_desc
		]);
	}

	public function getCareers()
	{
		$meta_title   = 'Be Part of The Team';
		$meta_keyword = 'Be Part of The Team';
		$meta_desc    = 'Be Part of The Team';

		return view('frontend.careers.index')->with([
			'meta_title'   => $meta_title,
			'meta_keyword' => $meta_keyword,
			'meta_desc'    => $meta_desc,
		]);
	}

	public function getInternship()
	{
		$meta_title   = 'Internship';
		$meta_keyword = 'Internship';
		$meta_desc    = 'Internship';
		$reviewers    = JobReviewer::Intern()->get()->sortBy('date');
		$jobs         = JobBlock::Intern()->where('delete', '=', 0)->get()->sortBy('sort_order');
		$backbtn      = url('join-the-team');

		return view('frontend.careers.internship')->with(compact('meta_title', 'meta_keyword', 'meta_desc', 'reviewers', 'jobs', 'backbtn'));
	}

	public function getFullemployment()
	{
		$meta_title   = 'Full Employment';
		$meta_keyword = 'Full Employment';
		$meta_desc    = 'Full Employment';
		$reviewers    = JobReviewer::Fulltime()->get();
		$jobs         = JobBlock::Fulltime()->where('delete', '=', 0)->get()->sortBy('sort_order');
		$backbtn      = url('join-the-team');

		return view('frontend.careers.fullemployment')->with(compact('meta_title', 'meta_keyword', 'meta_desc', 'reviewers', 'jobs', 'backbtn'));
	}

	public function getCredentialProject($slug)
	{
		if (empty($slug)) {

			return redirect()->to('/credential/');
		}

		$backbtn       = URL::action('HomeController@getCredential');
		$projects      = Category::where('slug', '=', $slug)
			->first()
			->projects()
			->where('status', Status::ACTIVE)
			->where('delete', false)
			->orderBy('sort_order')
			->get();
		$project_count = $projects->count();

		if ($project_count == 1) {

			return redirect()->to("credential/project/{$projects->first()->slug}");
		} else {

			if ($project_count >= 9) {

				$project_count = 9;
			}

			$template_file = 'frontend.project.template-' . $project_count;
		}

		return view($template_file)->with(compact('backbtn', 'projects'));
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

		if(empty($post)):
			return Redirect::to('/insights/');
		endif;

		$posts = Post::where('status', '=', Status::ACTIVE)->where('deleted', false)->where('slug','!=',$slug)
			->orderBy('created_at','desc')
			->take(4)
			->get();

	    $content = html_entity_decode($post->translate(Session::get('locale'))->description);
	    $content = trim(strip_tags(preg_replace("/<img[^>]+\>/i", " ", $content)));
	    $char_count = (Session::get('locale') == 'en')?80:50;
	    $desc = mb_substr($content,0,$char_count).'...';

		return view('frontend.insightdetail')->with(['post'=> $post,'posts'=> $posts,
			'meta_title'=> $post->translate(Session::get('locale'))->title,
			'meta_keyword'=> $post->translate(Session::get('locale'))->title,
			'meta_desc'=> $desc,
			])
			->with('backbtn', URL::action('HomeController@getInsights'));
	}

	public function getInsights()
	{
		$posts = Post::where('status', '=', Status::ACTIVE)->where('deleted', false)
			->orderBy('created_at','desc')
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
