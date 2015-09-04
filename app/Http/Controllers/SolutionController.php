<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Redirect;
use App\Models\Status;
use App\Models\Locale;
use App\Models\Solution;
use App\Models\SolutionTranslation;

use App\Services\FileHelper;

class SolutionController extends Controller {

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
		$solutions = Solution::where('delete', '=', false)->orderBy('sort_order')->get();

		return view('management.solution.index')->with('solutions', $solutions);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('management.solution.create');
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
			$solution = new Solution;

			if (isset($files) && !empty($files))
			{
				foreach ($files as $key => $val)
				{
					if ($key == 'new_grid_img_id')
					{
						$solution->grid_img_id = $fileHelper->uploadNewFile($val);
					}
					else if ($key == 'new_grid_bg_img_id')
					{
						$solution->grid_bg_img_id = $fileHelper->uploadNewFile($val);
					}
				}
			}
			else
			{
				$solution->grid_img_id    = $data['grid_img_id'];
				$solution->grid_bg_img_id = $data['grid_bg_img_id'];
			}

			$solution->pri_color_code = $data['pri_color_code'];
			$solution->sort_order     = $data['sort_order'];
			$solution->save();

			$solData    = array();
			$attributes = array('name', 'desc');
			$locales    = Locale::where('status', '=', STATUS::ACTIVE)->get();

			foreach ($locales as $locale)
			{
				$solData['solution_id'] = $solution->id;
				$solData['locale_id']  = $locale->id;

				foreach ($attributes as $attribute)
				{
					if (isset($data[$attribute][$locale->id]))
					{
						$solData[$attribute] = $data[$attribute][$locale->id];
					}
				}

				SolutionTranslation::create($solData);
			}

			$response['code'] = STATUS::SUCCESS;
			$response['msg']  = "Solution [#".$solution->id."] has been created successfully.";

			return Redirect::to('admin/manage/solution')->with('response', $response);			
		}

		$response['code'] = STATUS::ERROR;
		$response['msg']  = "Unable to created new solution.";

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
		$solution = Solution::find($id);

		return view('management.solution.edit')->with('solution', $solution);
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
		$solution = Solution::find($id);

		if (isset($data) && $solution->id)
		{
			$files = $req->file();

			if (isset($files) && !empty($files))
			{
				foreach ($files as $key => $val)
				{
					if ($key == 'new_grid_img_id')
					{
						$solution->grid_img_id = $fileHelper->uploadNewFile($val);
					}
					else if ($key == 'new_grid_bg_img_id')
					{
						$solution->grid_bg_img_id = $fileHelper->uploadNewFile($val);
					}
				}
			}
			else
			{
				$solution->grid_img_id    = $data['grid_img_id'];
				$solution->grid_bg_img_id = $data['grid_bg_img_id'];
			}

			$solution->pri_color_code = $data['pri_color_code'];
			$solution->sort_order     = $data['sort_order'];
			$solution->save();

			$solData    = array();
			$attributes = array('name', 'desc');
			$locales    = Locale::where('status', '=', STATUS::ACTIVE)->get();

			foreach ($locales as $locale)
			{
				$solData['solution_id'] = $solution->id;
				$solData['locale_id']   = $locale->id;

				foreach ($attributes as $attribute)
				{
					if (isset($data[$attribute][$locale->id]))
					{
						$solData[$attribute] = $data[$attribute][$locale->id];
					}
				}

				$solTranslation = $solution->translations()
					->where('locale_id', $locale->id)
					->first();

				if (isset($solTranslation))
				{
					$solTranslation->update($solData);
				}
				else
				{
					SolutionTranslation::create($solData);
				}
			}

			$response['code'] = STATUS::SUCCESS;
			$response['msg']  = "Solution [#".$solution->id."] has been updated successfully.";

			return Redirect::to('admin/manage/solution')->with('response', $response);
		}

		$response['code'] = STATUS::ERROR;
		$response['msg']  = "Unable to update solution.";

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
		$solution = Solution::find($id);

		if (isset($solution) && isset($solution->id))
		{
			$solution->delete = true;
			$solution->save();

			$response['code'] = Status::SUCCESS;
			$response['msg']  = "Solution [#".$solution->id."] has been deleted successfully.";
		}
		else
		{
			$response['code'] = Status::ERROR;
			$response['msg']  = "Solution not found.";
		}

		return Redirect::to('admin/manage/solution')->with('response', $response);
	}

}
