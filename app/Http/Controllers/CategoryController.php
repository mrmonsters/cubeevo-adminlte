<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Redirect;
use App\Models\Status;
use App\Models\Locale;
use App\Models\Category;
use App\Models\CategoryTranslation;

use App\Services\FileHelper;

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
	public function index()
	{
		//
		$categories = Category::where('status', '=', STATUS::ACTIVE)->orderBy('sort_order')->get();

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
	public function store(Request $req, FileHelper $fileHelper)
	{
		$response = array();
		$data     = $req->input();

		if (isset($data))
		{
			$files = $req->file();
			$category = new Category;

			if (isset($files) && !empty($files))
			{
				foreach ($files as $key => $val)
				{
					if ($key == 'new_grid_img_id')
					{
						$category->grid_img_id = $fileHelper->uploadNewFile($val);
					}
					else if ($key == 'new_grid_bg_img_id')
					{
						$category->grid_bg_img_id = $fileHelper->uploadNewFile($val);
					}
				}
			}
			else
			{
				$category->grid_img_id    = $data['grid_img_id'];
				$category->grid_bg_img_id = $data['grid_bg_img_id'];
			}

			$category->sort_order = $data['sort_order'];
			$category->save();

			$catData    = array();
			$attributes = array('name', 'desc');
			$locales 	= Locale::where('status', '=', STATUS::ACTIVE)->get();

			foreach ($locales as $locale)
			{
				$catData['category_id'] = $category->id;
				$catData['locale_id']   = $locale->id;

				foreach ($attributes as $attribute)
				{
					if (isset($data[$attribute][$locale->id]))
					{
						$catData[$attribute] = $data[$attribute][$locale->id];
					}
				}

				CategoryTranslation::create($catData);
			}

			return Redirect::to('admin/manage/category')->with('response', $response);			
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
		$category = Category::find($id);

		return view('management.category.edit')->with('category', $category);
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
		$category = Category::find($id);

		if (isset($data) && $category->id)
		{
			$files = $req->file();

			if (isset($files) && !empty($files))
			{
				foreach ($files as $key => $val)
				{
					if ($key == 'new_grid_img_id')
					{
						$category->grid_img_id = $fileHelper->uploadNewFile($val);
					}
					else if ($key == 'new_grid_bg_img_id')
					{
						$category->grid_bg_img_id = $fileHelper->uploadNewFile($val);
					}
				}
			}
			else
			{
				$category->grid_img_id    = $data['grid_img_id'];
				$category->grid_bg_img_id = $data['grid_bg_img_id'];
			}

			$category->sort_order = $data['sort_order'];
			$category->save();

			$catData    = array();
			$attributes = array('name', 'desc');
			$locales 	= Locale::where('status', '=', STATUS::ACTIVE)->get();

			foreach ($locales as $locale)
			{
				$catData['category_id'] = $category->id;
				$catData['locale_id']   = $locale->id;

				foreach ($attributes as $attribute)
				{
					if (isset($data[$attribute][$locale->id]))
					{
						$catData[$attribute] = $data[$attribute][$locale->id];
					}
				}

				$catTranslation = $category->translations()
					->where('locale_id', $locale->id)
					->first();

				if (isset($catTranslation))
				{
					$catTranslation->update($catData);
				}
				else
				{
					CategoryTranslation::create($catData);
				}
			}

			return Redirect::to('admin/manage/category')->with('response', $response);
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
