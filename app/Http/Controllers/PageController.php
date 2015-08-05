<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Page;
use App\Menu;
use App\Section;
use App\PageMenu;
use App\PageSection;

class PageController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$pages = Page::all();

		return view('management\page\index')
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
		$pMenus = Menu::all();
		$cMenus = Menu::all();
		$sections = Section::all();

		return view('management\page\create')
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
		$msg = 'Failed to add new page.';
		$data = $req->input();

		if (is_array($data) && !empty($data))
		{
			// Save new page
			$page = new Page;
			$page->page_title = $data['page_title'];
			$page->page_desc = $data['page_desc'];
			$page->page_slug = $data['page_slug'];
			$page->page_locale = $data['page_locale'];
			$page->page_content = $data['page_content'];
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
						$pageSection->page_id = $page->id;
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

				$msg = 'New page is added successfully.';
			}
		}

		return redirect('manage/page')->with('session_msg', $msg);
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
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
