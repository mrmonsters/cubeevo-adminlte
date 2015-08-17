<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Section;
use App\Page;
use App\PageSection;

class SectionController extends Controller {

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
		$sections = Section::all();

		return view('management\section\index')
			->with('sections', $sections);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$pages = Page::all();

		return view('management\section\create')
			->with('pages', $pages);
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
			$section = new Section;
			$section->section_title = $data['section_title'];
			$section->section_desc = $data['section_desc'];
			$section->section_locale = $data['section_locale'];
			$section->section_content = htmlentities($data['section_content']);
			$section->status = 2;
			$section->save();

			if ($section->save())
			{
				if (isset($data['add_to_page']) && $data['add_to_page'] == '1' && isset($data['page_id']))
				{
					$pageSection = new PageSection;
					$pageSection->page_id = $data['page_id'];
					$pageSection->section_id = $section->section_id;
					$pageSection->status = 2;
					$pageSection->save();
				}

				$response['status'] = 1;
				$response['msg'] = 'New section is added successfully.';
			}
			else
			{
				$response['status'] = 0;
				$response['msg'] = 'Failed to add new section.';
			}
		}

		return redirect('admin/manage/section')->with('response', $response);
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
		$section = Section::find($id);
		$pages = Page::all();
		$pageSections = PageSection::where('section_id', '=', $id)->get();

		return view('management\section\edit')
			->with('section', $section)
			->with('pages', $pages)
			->with('pageSections', $pageSections);
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
		$section = Section::find($id);
		$section->section_title = $data['section_title'];
		$section->section_desc = $data['section_desc'];
		$section->section_locale = $data['section_locale'];
		$section->section_content = htmlentities($data['section_content']);

		if ($data['add_to_page'] == '1')
		{
			// Save all selected pages
			foreach ($data['page_id'] as $pageId)
			{
				$pageSection = PageSection::where('page_id', '=', $pageId)
					->where('page_id', '=', $pageId)
					->first();

				if (!$pageSection->page_section_id)
				{
					$pSection = new PageSection;
					$pSection->page_id = $pageId;
					$pSection->section_id = $id;
					$pSection->save();
				}
			}
		}
		else if ($data['add_to_page'] == '0')
		{
			// De-activate all relevant records
			$pageSections = PageSection::where('section_id', '=', $id)->get();

			if (!$pageSections->isEmpty())
			{
				foreach ($pageSections as $pageSection)
				{
					$pageSection->status = '1';
					$pageSection->save();
				}
			}
		}

		if ($section->save())
		{
			$response['status'] = 1;
			$response['msg'] = 'Changes are saved successfully.';
		}
		else
		{
			$response['status'] = 0;
			$response['msg'] = 'Failed to save changes.';
		}

		return redirect('admin/manage/section')->with('response', $response);
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
