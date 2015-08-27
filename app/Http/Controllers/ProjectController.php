<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Locale;
use App\Models\EntityInstance;
use App\Models\EntityChild;
use App\Services\GeneralHelper;

class ProjectController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(GeneralHelper $genHelper)
	{
		//
		$codes =  array(
			'name',
		);
		$projects = $genHelper->getEntityCollection('project', $codes);

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
	public function store(Request $req, GeneralHelper $genHelper)
	{
		//
		$data = $req->input();

		if (isset($data))
		{
			$project = array();
			$codes   = array('name', 'desc');
			$locales = Locale::where('status', '=', '2')->get();

			foreach ($codes as $code)
			{
				$item = array();

				foreach ($locales as $locale)
				{
					if ($data[$code][$locale->id] != '')
					{
						$item[$locale->id] = $data[$code][$locale->id];
					}
				}

				$project[$code] = $item;
			}

			$attrs = array(
				'founder',
				'year',
				'cover_img_id',
				'grid_img_id',
				'grid_bg_img_id',
				'pri_bg_color_code',
				'sec_bg_color_code',
				'sort_order'
			);

			foreach ($attrs as $attr)
			{
				$project[$attr] = $data[$attr];
			}

			if (!empty($project))
			{
				$projectObj = $genHelper->saveEntity('project', $project);

				if ($projectObj->id)
				{
					$child = new EntityChild;
					$child->parent_id = $data['parent_id'];
					$child->child_id = $projectObj->id;
					$child->save();

					return redirect('admin/manage/project');
				}
			}
		}

		return redirect('admin/manage/project/create');
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
	public function edit($id, GeneralHelper $genHelper)
	{
		//
		$locales = Locale::where('status', '=', '2')->get();
		$codes =  array(
			'name',
			'desc',
			'cover_img_id',
			'grid_img_id',
			'grid_bg_img_id',
			'img_ids',
			'pri_bg_color_code',
			'sec_bg_color_code',
			'txt_color_code',
			'founder',
			'year',
			'sort_order'
		);
		$entity = EntityInstance::find($id);

		$project = array();
		foreach ($codes as $code)
		{
			$project[$code] = $genHelper->getAttribute($code, $entity);
		}
		$project['id'] = $entity->id;

		$child = EntityChild::where('child_id', '=', $entity->id)->first();

		if (isset($child) && $child->id)
		{
			$project['parent_id'] = $child->parent_id;
		}

		return view('management.project.edit')
			->with('locales', $locales)
			->with('project', $project);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $req, GeneralHelper $genHelper)
	{
		//
		$data = $req->input();
		$instance = EntityInstance::find($id);

		if (isset($data) && $instance->id)
		{
			$codes = array(
				'name',
				'desc',
				'founder',
				'year',
				'cover_img_id',
				'grid_img_id',
				'grid_bg_img_id',
				'img_ids',
				'pri_bg_color_code',
				'sec_bg_color_code',
				'sort_order'
			);

			$attrs = array();
			foreach ($codes as $code)
			{
				if (isset($data[$code]))
				{
					$attrs[$code] = $data[$code];
				}
			}

			foreach ($attrs as $code => $attr)
			{
				if (is_array($attr))
				{
					foreach ($attr as $k => $v)
					{
						$locale = Locale::find($k);

						if ($locale->id)
						{
							$genHelper->saveAttribute($code, $v, $instance, $locale->code);
						}
					}
				}
				else
				{
					$genHelper->saveAttribute($code, $attr, $instance);
				}
			}

			$child = EntityChild::where('child_id', '=', $instance->id)->first();
			$child->parent_id = $data['parent_id'];
			$child->save();

			return redirect('admin/manage/project/');
		}

		return redirect('admin/manage/project/edit/' . $id);
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
