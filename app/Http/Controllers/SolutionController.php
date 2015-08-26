<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use File;

use App\Models\Locale;
use App\Models\EntityInstance;
use App\Models\Files;

use App\Services\GeneralHelper;

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
	public function index(GeneralHelper $genHelper)
	{
		//
		$codes =  array(
			'name',
			'sort_order'
		);
		$solutions = $genHelper->getEntityCollection('solution', $codes);

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
	public function store(Request $req)
	{
		//
		$data = $req->input();

		if (isset($data))
		{
			$solution = array();
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

				$solution[$code] = $item;
			}

			$attrs = array(
				'grid_img_id', 
				'grid_bg_img_id', 
				'pri_bg_color_code',
				'sort_order'
			);

			foreach ($attrs as $attr)
			{
				$solution[$attr] = $data[$attr];
			}

			if (!empty($category))
			{
				$solutionObj = $genHelper->saveEntity('solution', $solution);

				if ($solutionObj->id)
				{
					return redirect('admin/manage/solution');
				}
			}
		}

		return redirect('admin/manage/solution/create');
		/*
		$response = array();
		$data     = $req->input();
		$files    = $req->file();

		if (is_array($data) && !empty($data))
		{
			$sol     = array();
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

				$sol[$code] = $item;
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

			$sol['sort_order']    = $data['sort_order'];
			$sol['img_id']        = ($data['old_img_id'] != '') ? $data['old_img_id'] : $imgId;
			$sol['bg_img_id']     = ($data['old_bg_img_id'] != '') ? $data['old_bg_img_id'] : $bgImgId;
			$sol['bg_color_code'] = $data['bg_color_code'];

			$solution = $solHelper->saveNewSolution($sol);

			if ($solution != false && $solution->id)
			{
				// Redirect with success
			}

			// Redirect with error

			return redirect('admin/manage/solution');
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
			'desc',
			'grid_img_id', 
			'grid_bg_img_id', 
			'pri_bg_color_code',
			'sort_order'
		);

		$solution = array();
		foreach ($codes as $code)
		{
			$solution[$code] = $genHelper->getAttribute($code, $instance);
		}
		$solution['id'] = $instance->id;

		return view('management.solution.edit')->with('solution', $solution);
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
				'grid_img_id', 
				'grid_bg_img_id', 
				'pri_bg_color_code',
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

			return redirect('admin/manage/solution/');
		}

		return redirect('admin/manage/solution/edit/' . $id);
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
