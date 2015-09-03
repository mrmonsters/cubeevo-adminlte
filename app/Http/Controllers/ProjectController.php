<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Redirect;
use App\Models\Status;
use App\Models\Locale;
use App\Models\Block;
use App\Models\Project;
use App\Models\ProjectTranslation;
use App\Models\ProjectFile;
use App\Models\Category;

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

		$categories = Category::where('status', '=', STATUS::ACTIVE)->get(); 
		
		return view('management.project.index')->with('projects', $projects)->with('categories', $categories);
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
			$files     = $req->file();
			$project   = new Project;
			$newImgIds = array();

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
					else if ($key == 'new_mascott_img_id')
					{
						$project->mascott_img_id = $fileHelper->uploadNewFile($val);
					}
					else if ($key == 'new_video_img_id')
					{
						$project->video_img_id = $fileHelper->uploadNewFile($val);
					}
					else if ($key == 'new_project_img_id')
					{
						foreach ($val as $id => $img)
						{
							if (is_array($img) && !empty($img))
							{
								$imgs = array();
								foreach ($img as $k => $v)
								{
									if (isset($v))
									{
										$imgs[] = $fileHelper->uploadNewFile($v);
									}
								}

								$newImgIds[$id] = implode(",", $imgs);
							}
						}
					}
				}
			}

			if (isset($data['grid_img_id']) && $data['grid_img_id'] != null)
			{
				$project->grid_img_id    = $data['grid_img_id'];
			}
			if (isset($data['grid_bg_img_id']) && $data['grid_bg_img_id'] != null)
			{
				$project->grid_bg_img_id = $data['grid_bg_img_id'];
			}
			if (isset($data['brand_img_id']) && $data['brand_img_id'] != null)
			{
				$project->brand_img_id 	 = $data['brand_img_id'];
			}
			if (isset($data['video_img_id']) && $data['video_img_id'] != null)
			{
				$project->video_img_id   = $data['video_img_id'];
			}
			if (isset($data['mascott_img_id']) && $data['mascott_img_id'] != null)
			{
				$project->mascott_img_id = $data['mascott_img_id'];
			}

			$project->category_id    = $data['category_id'];
			$project->pri_color_code = $data['pri_color_code'];
			$project->sec_color_code = $data['sec_color_code'];
			$project->txt_color_code = $data['txt_color_code'];
			$project->web_link		 = $data['web_link'];
			$project->year           = $data['year'];
			$project->sort_order     = $data['sort_order'];
			$project->save();

			$projData   = array();
			$attributes = array('name', 'background', 'challenge', 'result', 'sub_heading', 'client_name');
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

			if (isset($data['block']) && !empty($data['block']))
			{
				for ($i = 0; $i < count($data['block']['type']); $i++)
				{
					$block = new Block;
					$block->project_id = $project->id;
					$block->sort_order = $data['block']['sort'][$i];

					if ($data['block']['type'][$i] == Block::IMAGE || $data['block']['type'][$i] == Block::VIDEO)
					{
						$block->type = Block::VIDEO;
						$block->value = $data['block']['value'][$i];
					}
					else if ($data['block']['type'][$i] == Block::GALLERY)
					{
						$block->type = Block::GALLERY;
						if (!empty($newImgIds) && isset($newImgIds[$i]))
						{
							$images = $newImgIds[$i];
						}
						else
						{
							$imgIds = explode(",", $data['block']['value'][$i]);
							$sortOrders = explode(",", $data['block']['project_img_sort_order'][$i]);
							$images = array();
							if (count($imgIds) == count($sortOrders))
							{
								for ($x = 0; $x < count($imgIds); $x++)
								{
									$images[$sortOrders[$x]] = $imgIds[$x];
								}
								$images = implode(",", ksort($images));
							}
							else
							{
								$images = $imgIds;
							}
						}
						$block->value = $images;
					}

					$block->save();
				}
			}	

			$response['code'] = STATUS::SUCCESS;
			$response['msg']  = "Project [#".$project->id."] has been created successfully.";

			return Redirect::to('admin/manage/project')->with('response', $response);			
		}

		$response['code'] = STATUS::ERROR;
		$response['msg']  = "Unable to create new project.";

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
		$response  = array();
		$data      = $req->input();
		dd($data);
		$project   = Project::find($id);
		$newImgIds = array();

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
					else if ($key == 'new_mascott_img_id')
					{
						$project->mascott_img_id = $fileHelper->uploadNewFile($val);
					}
					else if ($key == 'new_video_img_id')
					{
						$project->video_img_id = $fileHelper->uploadNewFile($val);
					}
					else if ($key == 'new_project_img_id')
					{
						foreach ($val as $img)
						{
							$newImgIds[] = $FileHelper->uploadNewFile($img);
						}
					}
				}
			}
			
			if (isset($data['grid_img_id']) && $data['grid_img_id'] != null)
			{
				$project->grid_img_id    = $data['grid_img_id'];
			}
			if (isset($data['grid_bg_img_id']) && $data['grid_bg_img_id'] != null)
			{
				$project->grid_bg_img_id = $data['grid_bg_img_id'];
			}
			if (isset($data['brand_img_id']) && $data['brand_img_id'] != null)
			{
				$project->brand_img_id 	 = $data['brand_img_id'];
			}
			if (isset($data['video_img_id']) && $data['video_img_id'] != null)
			{
				$project->video_img_id   = $data['video_img_id'];
			}
			if (isset($data['mascott_img_id']) && $data['mascott_img_id'] != null)
			{
				$project->mascott_img_id = $data['mascott_img_id'];
			}

			$project->category_id	 = $data['category_id'];
			$project->pri_color_code = $data['pri_color_code'];
			$project->sec_color_code = $data['sec_color_code'];
			$project->txt_color_code = $data['txt_color_code'];
			$project->web_link		 = $data['web_link'];
			$project->year           = $data['year'];
			$project->sort_order     = $data['sort_order'];
			$project->save();

			$projData   = array();
			$attributes = array('name', 'background', 'challenge', 'result', 'sub_heading', 'client_name');
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

			if (isset($data['block']) && !empty($data['block']))
			{
				$projBlocks = array();
				foreach ($project->blocks()->get() as $item)
				{
					$projBlocks[] = $item;
				}

				for ($i = 0; $i < count($data['block']['type']); $i++)
				{
					$block = array();
					$block['project_id'] = $project->id;
					$block['sort_order'] = $data['block']['sort_order'][$i];

					if ($data['block']['type'][$i] == Block::IMAGE || $data['block']['type'][$i] == Block::VIDEO)
					{
						$block['type']  = Block::VIDEO;
						$block['value'] = $data['block']['value'][$i];
					}
					else if ($data['block']['type'][$i] == Block::GALLERY)
					{
						$block['type'] = Block::GALLERY;
						if (!empty($newImgIds) && isset($newImgIds[$i]))
						{
							$images = $newImgIds[$i];
						}
						else
						{
							$imgIds = explode(",", $data['block']['value'][$i]);
							$sortOrders = explode(",", $data['block']['project_img_sort_order'][$i]);
							$images = array();
							if (count($imgIds) == count($sortOrders))
							{
								for ($x = 0; $x < count($imgIds); $x++)
								{
									$images[$sortOrders[$x]] = $imgIds[$x];
								}
								$images = implode(",", ksort($images));
							}
							else
							{
								$images = $imgIds;
							}
						}
						$block['value'] = $images;
					}

					if (isset($projBlocks[$i]))
					{
						$projBlocks[$i]->update($block);
					}
					else
					{
						Block::create($block);
					}
				}
			}

			if (isset($data['deleted_block']))
			{
				$blockIds = explode(",", $data['deleted_block']);
				foreach ($blockIds as $id)
				{
					if (!isset($data['block']['type'][$id]))
					{
						$block = Block::find($id);
						$block->deleted = true;
						$block->save();
					}
				}
			}

			$response['code'] = STATUS::SUCCESS;
			$response['msg']  = "Project [#".$project->id."] has been updated successfully.";

			return Redirect::to('admin/manage/project')->with('response', $response);
		}

		$response['code'] = STATUS::ERROR;
		$response['msg']  = "Unable to update project.";

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
