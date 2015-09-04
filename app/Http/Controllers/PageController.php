<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Redirect;

use App\Models\Status;
use App\Models\Locale;
use App\Models\Page;
use App\Models\PageTranslation;

class PageController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$pages = Page::where('delete', '=', false)->get();

		return view('management.page.index')->with('pages', $pages);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('management.page.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $req)
	{
		//
		$response = array();
		$data = $req->input();

		if (is_array($data) && !empty($data))
		{
			if (Page::where('slug', '=', $data['slug'])->where('status', Status::ACTIVE)->get()->count() > 0)
			{
				$response['code'] = Status::ERROR;
				$response['msg']  = "URL key already exist.";

				return Redirect::back()->with('response', $response);
			}
			else
			{
				// Create new page
				$page = new Page;
				$page->name = $data['name'];
				$page->slug = str_replace(" ", "-", $data['slug']);
				$page->save();

				$pageData   = array();
				$attributes = array('desc', 'content');
				$locales    = Locale::where('status', '=', Status::ACTIVE)->get();

				foreach ($locales as $locale)
				{
					$pageData['page_id']   = $page->id;
					$pageData['locale_id'] = $locale->id;

					foreach ($attributes as $attribute)
					{
						if (isset($data[$attribute][$locale->id]))
						{
							if ($attribute == 'content')
							{
								$pageData[$attribute] = htmlentities($data[$attribute][$locale->id]);
							}
							else
							{
								$pageData[$attribute] = $data[$attribute][$locale->id];
							}
						}
					}

					PageTranslation::create($pageData);
				}

				$response['code'] = Status::SUCCESS;
				$response['msg']  = 'Page [#'.$page->id.'] has been created successfully.';

				return Redirect::to('admin/manage/page')->with('response', $response);
			}
		}

		$response['code'] = Status::ERROR;
		$respons['msg']   = 'Unable to create new page.';

		return Redirect::back()->with('response', $response);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$response = array();
		$page = Page::where('id', '=', $id)->where('delete', false)->first();

		if (isset($page) && isset($page->id))
		{
			return view('management.page.edit')->with('page', $page);
		}
		else
		{
			$response['code'] = Status::ERROR;
			$response['msg']  = 'Page not found.';
			
			return Redirect::back()->with('response', $response);
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $req)
	{
		//
		$response = array();
		$data = $req->input();

		if (is_array($data) && !empty($data))
		{
			if (Page::where('slug', '=', $data['slug'])->where('status', Status::ACTIVE)->get()->count() > 0)
			{
				$response['code'] = Status::ERROR;
				$response['msg']  = "URL key already exist.";

				return Redirect::back()->with('response', $response);
			}
			else
			{
				// Update page
				$page = Page::find($id);
				$page->name = $data['name'];
				$page->slug = str_replace(" ", "-", $data['slug']);
				$page->save();

				$pageData   = array();
				$attributes = array('desc', 'content');
				$locales    = Locale::where('status', '=', Status::ACTIVE)->get();

				foreach ($locales as $locale)
				{
					$pageData['page_id']   = $page->id;
					$pageData['locale_id'] = $locale->id;

					foreach ($attributes as $attribute)
					{
						if (isset($data[$attribute][$locale->id]))
						{
							if ($attribute == 'content')
							{
								$pageData[$attribute] = htmlentities($data[$attribute][$locale->id]);
							}
							else
							{
								$pageData[$attribute] = $data[$attribute][$locale->id];
							}
						}
					}

					$pageTranslation = $page->translations()
						->where('locale_id', $locale->id)
						->first();

					if (isset($pageTranslation))
					{
						$pageTranslation->update($pageData);
					}
					else
					{
						PageTranslation::create($pageData);
					}
				}

				$response['code'] = Status::SUCCESS;
				$response['msg']  = 'Page [#'.$page->id.'] has been updated successfully.';

				return Redirect::to('admin/manage/page')->with('response', $response);
			}
		}

		$response['code'] = Status::ERROR;
		$respons['msg']   = 'Unable to update page.';

		return Redirect::back()->with('response', $response);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$response = array();
		$page     = Page::find($id);

		if (isset($page) && isset($page->id))
		{
			$page->delete = true;
			$page->save();

			$response['code'] = Status::SUCCESS;
			$response['msg']  = "Page [#".$project->id."] has been deleted successfully.";
		}
		else
		{
			$response['code'] = Status::ERROR;
			$response['msg']  = "Page not found.";
		}

		return Redirect::to('admin/manage/page')->with('response', $response);
	}

}
