<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Page;
use App\Models\Menu;
use App\Models\Block;
use App\Models\PageMenu;
use App\Models\PageBlock;

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
		$pages = Page::all();

		return view('management.page.index')
			->with('pages', $pages);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$pMenus = Menu::whereNull('parent_menu_id')->get();
		$cMenus = Menu::whereNotNull('parent_menu_id')->get();
		$sections = Section::all();

		return view('management.page.create')
			->with('pMenus', $pMenus)
			->with('cMenus', $cMenus)
			->with('sections', $sections);
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
			// Save new page
			$page = new Page;
			$page->page_title = $data['page_title'];
			$page->page_desc = $data['page_desc'];
			$page->page_slug = $data['page_slug'];
			$page->page_locale = $data['page_locale'];
			$page->page_content = htmlentities($data['page_content']);
			$page->status = 2;

			if ($page->save())
			{
				// Save page section
				if ($data['section_id'])
				{
					$sectionIds = explode(",", $data['section_id']);

					foreach ($sectionIds as $id)
					{
						$pageSection = new PageSection;
						$pageSection->page_id = $page->page_id;
						$pageSection->section_id = $id;
						$pageSection->status = 2;
						$pageSection->save();
					}
				}

				// Save page menu
				if (isset($data['page_menu']) && is_array($data['page_menu']) && !empty($data['page_menu']))
				{
					foreach ($data['page_menu'] as $id)
					{
						$pageMenu = new PageMenu;
						$pageMenu->page_id = $page->id;
						$pageMenu->menu_id = $id;
						$pageMenu->status = 2;
						$pageMenu->save();
					}
				}

				$response['status'] = 1;
				$response['msg'] = 'New page is added successfully.';
			}
			else
			{
				$response['status'] = 0;
				$response['msg'] = 'Failed to add new page.';
			}
		}

		return redirect('admin/manage/page')->with('response', $response);
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
		$page = Page::find($id);
		$menus = PageMenu::where('id', '=', $id)->get();

		$pMenus = Menu::whereNull('parent_id')->get();
		$cMenus = Menu::whereNotNull('parent_id')->get();
		$pageMenuIds = array();

		if (!$menus->isEmpty())
		{
			foreach ($menus as $menu)
			{
				$pageMenuIds[] = $menu->id;
			}
		}

		return view('management.page.edit')
			->with('page', $page)
			->with('pMenus', $pMenus)
			->with('cMenus', $cMenus)
			->with('pageMenuIds', $pageMenuIds);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $req, $id)
	{
		//
		$response = array();
		$data = $req->input();

		if (is_array($data) && !empty($data))
		{
			// Update page
			$page = Page::find($id);
			$page->page_title = $data['page_title'];
			$page->page_desc = $data['page_desc'];
			$page->page_slug = $data['page_slug'];
			$page->page_locale = $data['page_locale'];
			$page->page_content = htmlentities($data['page_content']);

			// Save page section
			if ($data['section_id'])
			{
				$sectionIds = explode(",", $data['section_id']);

				foreach ($sectionIds as $sectionId)
				{
					$pageSection = PageSection::where('page_id', '=', $id)
						->where('section_id', '=', $sectionId)
						->get();

					if ($pageSection->isEmpty())
					{
						$pageSection = new PageSection;
						$pageSection->page_id = $id;
						$pageSection->section_id = $sectionId;
						$pageSection->status = 2;
						$pageSection->save();
					}
				}
			}

			// Save page menu
			if (isset($data['page_menu']) && is_array($data['page_menu']) && !empty($data['page_menu']))
			{
				foreach ($data['page_menu'] as $menuId)
				{
					$pageMenu = PageMenu::where('page_id', '=', $id)
						->where('menu_id', '=', $menuId)
						->get();

					if ($pageMenu->isEmpty())
					{
						$pageMenu = new PageMenu;
						$pageMenu->page_id = $id;
						$pageMenu->menu_id = $menuId;
						$pageMenu->status = 2;
						$pageMenu->save();
					}
				}
			}

			if ($page->save())
			{
				$response['status'] = 1;
				$response['msg'] = 'Changes are saved successfully.';
			}
			else
			{
				$response['status'] = 0;
				$respons['msg'] = 'Failed to save changes.';
			}
		}

		return redirect('admin/manage/page')->with('response', $response);
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
	}

}
