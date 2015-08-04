<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Section;
use App\Page;

class SectionController extends Controller {

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
		$data = $req->input();

		if (is_array($data) && !empty($data))
		{
			$section = new Section;
			$section->section_title = $data['section_title'];
			$section->section_desc = $data['section_desc'];
			$section->section_locale = $data['section_locale'];
			$section->section_content = $data['section_content'];
			$section->status = 2;
			$section->save();

			if (isset($data['add_to_page']) && $data['add_to_page'] == '1' && isset($data['page_id']))
			{
				$pageSection = new PageSection;
				$pageSection->page_id = $data['page_id'];
				$pageSection->section_id = $data['section_id'];
				$pageSection->status = 2;
				$pageSection->save();
			}
		}

		return redirect('manage/section')->with('session_msg', 'New section is added successfully.');
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
