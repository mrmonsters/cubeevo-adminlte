<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use File;

use App\Models\Locale;
use App\Models\Entity;
use App\Models\Files;

use App\Services\GeneralHelper;
use App\Services\SolutionHelper;

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
			'desc',
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
		$locales = Locale::where('status', '=', '2')->get();

		return view('management.solution.create')->with('locales', $locales);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $req, SolutionHelper $solHelper)
	{
		//
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
