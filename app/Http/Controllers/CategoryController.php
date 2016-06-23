<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Redirect;
use Validator;
use App\Models\Status;
use App\Models\Locale;
use App\Models\Category;
use App\Models\CategoryTranslation;

use App\Services\FileHelper;
use App\Services\ValidationHelper;

class CategoryController extends Controller {

	/**
	 * CategoryController constructor.
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
		$categories = Category::where('delete', '=', false)->orderBy('sort_order')->get();

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
	public function store(Request $req, FileHelper $fileHelper, ValidationHelper $validator)
	{
		$response = array();
		$data     = $req->input();

		if (isset($data) && !empty($data))
		{
			$fields = array('slug');

			if ($result = $validator->validateRequired($fields, $data))
			{
				$response['code'] = Status::ERROR;
				$response['msg']  = $result;

				return Redirect::back()->with('response', $response);
			}
			else if (Category::where('slug', '=', $data['slug'])->where('status', Status::ACTIVE)->get()->count() > 0)
			{
				$response['code'] = Status::ERROR;
				$response['msg']  = "URL key already exist.";

				return Redirect::back()->with('response', $response);
			}
			else
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

				$category->slug 	  = str_replace(" ", "-", $data['slug']);
				$category->sort_order = $data['sort_order'];
				$category->save();

				$catData    = array();
				$attributes = array('name');
				$locales 	= Locale::where('status', '=', Status::ACTIVE)->get();

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

				$response['code'] = Status::SUCCESS;
				$response['msg']  = "Category [#".$category->id."] has been created successfully.";

				return Redirect::to('admin/manage/category')->with('response', $response);
			}			
		}

		$response['code'] = Status::ERROR;
		$response['msg']  = "Unable to save new category.";

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
		$response = array();
		$category = Category::where('id', '=', $id)
			->where('delete', false)
			->first();

		if (isset($category) && $category->exists) {

			return view('management.category.edit')->with('category', $category);
		} else {

			$response['code'] = Status::ERROR;
			$response['msg']  = 'Category not found.';
			
			return redirect()->back()->with('response', $response);
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $req, FileHelper $fileHelper, ValidationHelper $validator)
	{
		//
		$response = array();
		$data     = $req->input();
		$category = Category::find($id);

		if (isset($data) && $category->id)
		{
			$fields = array('slug');

			if ($result = $validator->validateRequired($fields, $data))
			{
				$response['code'] = Status::ERROR;
				$response['msg']  = $result;

				return Redirect::back()->with('response', $response);
			}
			else if (Category::where('slug', '=', $data['slug'])->where('status', Status::ACTIVE)->where('delete', false)->where('id', '!=', $id)->get()->count() > 0)
			{
				$response['code'] = Status::ERROR;
				$response['msg']  = "URL key already exist.";

				return Redirect::back()->with('response', $response);
			}
			else
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

				$category->slug 	  = str_replace(" ", "-", $data['slug']);
				$category->sort_order = $data['sort_order'];
				$category->save();

				$catData    = array();
				$attributes = array('name');
				$locales 	= Locale::where('status', '=', Status::ACTIVE)->get();

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

				$response['code'] = Status::SUCCESS;
				$response['msg']  = "Category [#".$category->id."] has been updated successfully.";

				return Redirect::to('admin/manage/category')->with('response', $response);
			}
		}

		$response['code'] = Status::ERROR;
		$response['msg']  = "Unable to update category.";

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
		$category = Category::find($id);

		if (isset($category) && isset($category->id))
		{
			$category->delete = true;
			$category->save();

			$response['code'] = Status::SUCCESS;
			$response['msg'] = "Category [#".$category->id."] has been deleted successfully.";
		}
		else
		{
			$response['code'] = Status::ERROR;
			$response['msg'] = "Category not found.";
		}

		return Redirect::to('admin/manage/category')->with('response', $response);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function setInactive($id)
	{
		//
		$response = array();
		$category = Category::find($id); 

		if (isset($category) && isset($category->id))
		{
			$category->status = Status::INACTIVE;
			$category->save();

			$response['code'] = Status::SUCCESS;
			$response['msg']  = "Category [#".$category->id."] is deactivated successfully.";
		}
		else
		{
			$response['code'] = Status::ERROR;
			$response['msg']  = "Category not found.";
		}

		return Redirect::to('admin/manage/category')->with('response', $response);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function setActive($id)
	{
		//
		$response = array();
		$category = Category::find($id);

		if (isset($category) && isset($category->id))
		{
			$category->status = Status::ACTIVE;
			$category->save();

			$response['code'] = Status::SUCCESS;
			$response['msg']  = "Category [#".$category->id."] is activated successfully.";
		}
		else
		{
			$response['code'] = Status::ERROR;
			$response['msg']  = "Category not found.";
		}

		return Redirect::to('admin/manage/category')->with('response', $response);
	}

}
