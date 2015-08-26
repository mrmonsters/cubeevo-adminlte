<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use File;

use App\Models\Locale;
use App\Models\EntityInstance;
use App\Models\Files;

use App\Services\GeneralHelper;

class CategoryController extends Controller {

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
	public function index(GeneralHelper $genHelper)
	{
		//
		$codes =  array(
			'name',
		);
		$categories = $genHelper->getEntityCollection('category', $codes);

		return view('management.category.index')->with('categories', $categories);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('management.category.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $req)
	{
		$data = $req->input();

		if (isset($data))
		{
			$category = array();
			$codes   = array('name');
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

				$category[$code] = $item;
			}

			$attrs = array(
				'grid_img_id',
				'grid_bg_img_id',
				'sort_order'
			);

			foreach ($attrs as $attr)
			{
				$category[$attr] = $data[$attr];
			}

			if (!empty($category))
			{
				$categoryObj = $genHelper->saveEntity('category', $category);

				if ($categoryObj->id)
				{
					return redirect('admin/manage/category');
				}
			}
		}

		return redirect('admin/manage/category/create');
		//
		/*
		$response = array();
		$data     = $req->input();
		$files    = $req->file();

		if (is_array($data) && !empty($data))
		{
			$cat     = array();
			$codes   = array('name');
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

				$cat[$code] = $item;
			}

			$imgId = '';
			$bgImgId = '';

			if (!empty($files))
			{
				foreach ($files as $key => $val)
				{
					if (!$val->getClientSize() || !$val->getClientOriginalName() || !$val->getClientMimeType())
					{
						continue;
					}
					else
					{
						$fileName = $val->getClientOriginalName();
						$baseDir = '/storage/uploaded'; 

						// Save file
						$newFile = new Files;

						$newFile->name   = $fileName;
						$newFile->type   = $val->getClientMimeType();
						$newFile->dir    = $baseDir."/".$fileName;
						$newFile->size   = $val->getClientSize();
						$newFile->status = 2;
						$newFile->save();

						if (!File::exists(public_path().$baseDir))
						{
							File::makeDirectory(public_path().$baseDir);
						}

						$val->move(public_path().$baseDir, $fileName);

						if (File::exists(public_path().$baseDir."/".$fileName))
						{
							if ($key == 'img_id')
							{
								$imgId = $newFile->id;
							}
							else if ($key == 'bg_img_id')
							{
								$bgImgId = $newFile->id;
							}
						}
					}
				}
			}

			$cat['sort_order'] = $data['sort_order'];
			$cat['img_id']     = ($data['old_img_id'] != '') ? $data['old_img_id'] : $imgId;
			$cat['bg_img_id']  = ($data['old_bg_img_id'] != '') ? $data['old_bg_img_id'] : $bgImgId;

			$category = $catHelper->saveNewCategory($cat);

			if ($category != false && $category->id)
			{
				// Redirect with success
			}

			// Redirect with error

			return redirect('admin/manage/category');
		}
		*/
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
		$instance = EntityInstance::find($id);
		$codes = array(
			'name', 
			'grid_img_id', 
			'grid_bg_img_id', 
			'sort_order'
		);

		$category = array();
		foreach ($codes as $code)
		{
			$category[$code] = $genHelper->getAttribute($code, $instance);
		}
		$category['id'] = $instance->id;

		return view('management.category.edit')->with('category', $category);
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
				'grid_img_id',
				'grid_bg_img_id',
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

			return redirect('admin/manage/category/');
		}

		return redirect('admin/manage/category/edit/' . $id);
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
