<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Redirect;
use App\Models\Status;
use App\Models\Locale;
use App\Models\Project;
use App\Models\ProjectTranslation;

use App\Services\FileHelper;

class ProjectController extends Controller {

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
		$projects = Project::where('status', '=', STATUS::ACTIVE)->orderBy('sort_order')->get();

		return view('management.project.index')->with('projects', $projects);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('management.project.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $req, FileHelper $fileHelper)
	{
		//
		$response = array();
		$data     = $req->input();

		if (isset($data))
		{
			$files = $req->file();
			$project = new Project;

			if (isset($files) && !empty($files))
			{
				foreach ($files as $key => $val)
				{
					if ($key == 'new_grid_img_id')
					{
						$project->grid_img_id = $fileHelper->uploadNewFile($val);
					}
					else if ($key == 'new_grid_bg_img_id')
					{
						$project->grid_bg_img_id = $fileHelper->uploadNewFile($val);
					}
					else if ($key == 'new_brand_img_id')
					{
						$project->brand_img_id = $fileHelper->uploadNewFile($val);
					}
				}
			}
			else
			{
				$project->grid_img_id    = $data['grid_img_id'];
				$project->grid_bg_img_id = $data['grid_bg_img_id'];
				$project->brand_img_id 	 = $data['brand_img_id'];
			}

			$project->category_id    = $data['category_id'];
			$project->pri_color_code = $data['pri_color_code'];
			$project->sec_color_code = $data['sec_color_code'];
			$project->txt_color_code = $data['txt_color_code'];
			$project->year           = $data['year'];
			$project->sort_order     = $data['sort_order'];
			$project->save();

			$projData   = array();
			$attributes = array('name', 'desc', 'founder', 'client_name');
			$locales    = Locale::where('status', '=', STATUS::ACTIVE)->get();

			foreach ($locales as $locale)
			{
				$projData['project_id'] = $project->id;
				$projData['locale_id']  = $locale->id;

				foreach ($attributes as $attribute)
				{
					if (isset($data[$attribute][$locale->id]))
					{
						$projData[$attribute] = $data[$attribute][$locale->id];
					}
				}

				ProjectTranslation::create($projData);
			}

			return Redirect::to('admin/manage/project')->with('response', $response);			
		}

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
		$project = Project::find($id);

		return view('management.project.edit')->with('project', $project);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $req, FileHelper $fileHelper)
	{
		//
		$response = array();
		$data     = $req->input();
		$project = Project::find($id);

		if (isset($data) && $project->id)
		{
			$files = $req->file();

			if (isset($files) && !empty($files))
			{
				foreach ($files as $key => $val)
				{
					if ($key == 'new_grid_img_id')
					{
						$project->grid_img_id = $fileHelper->uploadNewFile($val);
					}
					else if ($key == 'new_grid_bg_img_id')
					{
						$project->grid_bg_img_id = $fileHelper->uploadNewFile($val);
					}
					else if ($key == 'new_brand_img_id')
					{
						$project->brand_img_id = $fileHelper->uploadNewFile($val);
					}
				}
			}
			else
			{
				$project->grid_img_id    = $data['grid_img_id'];
				$project->grid_bg_img_id = $data['grid_bg_img_id'];
				$project->brand_img_id 	 = $data['brand_img_id'];
			}

			$project->category_id	 = $data['category_id'];
			$project->pri_color_code = $data['pri_color_code'];
			$project->sec_color_code = $data['sec_color_code'];
			$project->txt_color_code = $data['txt_color_code'];
			$project->year           = $data['year'];
			$project->sort_order     = $data['sort_order'];
			$project->save();

			$projData   = array();
			$attributes = array('name', 'desc', 'founder', 'client_name');
			$locales    = Locale::where('status', '=', STATUS::ACTIVE)->get();

			foreach ($locales as $locale)
			{
				$projData['project_id'] = $project->id;
				$projData['locale_id']  = $locale->id;

				foreach ($attributes as $attribute)
				{
					if (isset($data[$attribute][$locale->id]))
					{
						$projData[$attribute] = $data[$attribute][$locale->id];
					}
				}

				$projTranslation = $project->translations()
					->where('locale_id', $locale->id)
					->first();

				if (isset($projTranslation))
				{
					$projTranslation->update($projData);
				}
				else
				{
					ProjectTranslation::create($projData);
				}
			}

			return Redirect::to('admin/manage/project')->with('response', $response);
		}

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
	}

}
