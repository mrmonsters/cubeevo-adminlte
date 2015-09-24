<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use File;
use Redirect;
use DateTime;
use App\Models\Status;
use App\Models\Locale;
use App\Models\ProfileBlock;
use App\Models\ProfileBlockTranslation;

class ProfileController extends Controller {

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
		$profiles = ProfileBlock::where('delete', '=', false)->orderBy('sort_order')->get();

		return view('management.profile.index')->with('profiles', $profiles);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('management.profile.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $req)
	{
		//
		$response = array();
		$data     = $req->input();
		$files    = $req->file();

		if (isset($data))
		{
			$imgDir = '';
			if (isset($files) && !empty($files))
			{
				foreach ($files as $file)
				{
					if ($file->getClientSize() && $file->getClientOriginalName() && $file->getClientMimeType())
					{
						$ext      = $file->getClientOriginalExtension();
						$fileName = $file->getClientOriginalName();
						$baseDir  = '/storage/uploaded/profile'; 
						$date     = new DateTime('now');
						$uId      = $date->format('YmdHis');

						if (!File::exists(public_path().$baseDir))
						{
							File::makeDirectory(public_path().$baseDir);
						}

						$file->move(public_path().$baseDir, $uId."_".$fileName);

						if (File::exists(public_path().$baseDir."/".$uId."_".$fileName))
						{
							// Set image directory
							$imgDir  = $baseDir."/".$uId."_".$fileName;
						}
					}
				}
			}

			$profile     = ProfileBlock::create(array(
				'sort_order' => $data['sort_order'],
				'name'       => $data['name'],
				'img_dir'    => $imgDir
			));
			$profileData = array();
			$attributes  = array('title', 'desc');
			$locales     = Locale::where('status', '=', Status::ACTIVE)->get();

			foreach ($locales as $locale)
			{
				$profileData['profile_block_id'] = $profile->id;
				$profileData['locale_id']        = $locale->id;

				foreach ($attributes as $attribute)
				{
					if (isset($data[$attribute][$locale->id]))
					{
						if ($attribute == 'desc')
						{
							$profileData[$attribute] = htmlentities($data[$attribute][$locale->id]);
						}
						else
						{
							$profileData[$attribute] = $data[$attribute][$locale->id];
						}
					}
				}

				ProfileBlockTranslation::create($profileData);
			}

			$response['code'] = Status::SUCCESS;
			$response['msg']  = "Profile [#".$profile->id."] has been created successfully.";

			return Redirect::to('admin/manage/profile')->with('response', $response);			
		}

		$response['code'] = Status::ERROR;
		$response['msg']  = "Unable to created new profile.";

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
		$profile = ProfileBlock::find($id);

		return view('management.profile.edit')->with('profile', $profile);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $req)
	{
		//
		$response = array();
		$data     = $req->input();
		$files 	  = $req->file();
		$profile  = ProfileBlock::find($id);

		if (isset($data) && $profile->id)
		{
			$imgDir = $data['img_dir'];
			if (isset($files) && !empty($files))
			{
				foreach ($files as $file)
				{
					if ($file->getClientSize() && $file->getClientOriginalName() && $file->getClientMimeType())
					{
						$ext      = $file->getClientOriginalExtension();
						$fileName = $file->getClientOriginalName();
						$baseDir  = '/storage/uploaded/profile'; 
						$date     = new DateTime('now');
						$uId      = $date->format('YmdHis');

						if (!File::exists(public_path().$baseDir))
						{
							File::makeDirectory(public_path().$baseDir);
						}

						$file->move(public_path().$baseDir, $uId."_".$fileName);

						if (File::exists(public_path().$baseDir."/".$uId."_".$fileName))
						{
							// Set image directory
							$imgDir  = $baseDir."/".$uId."_".$fileName;
						}
					}
				}
			}

			$profile->name = $data['name'];
			$profile->img_dir = $imgDir;
			$profile->sort_order = $data['sort_order'];
			$profile->save();

			$profileData = array();
			$attributes  = array('title', 'desc');
			$locales     = Locale::where('status', '=', Status::ACTIVE)->get();

			foreach ($locales as $locale)
			{
				$profileData['profile_block_id'] = $profile->id;
				$profileData['locale_id']   = $locale->id;

				foreach ($attributes as $attribute)
				{
					if (isset($data[$attribute][$locale->id]))
					{
						if ($attribute == 'desc')
						{
							$profileData[$attribute] = htmlentities($data[$attribute][$locale->id]);
						}
						else
						{
							$profileData[$attribute] = $data[$attribute][$locale->id];
						}
					}
				}

				$profileTranslation = $profile->translations()
					->where('locale_id', $locale->id)
					->first();

				if (isset($profileTranslation))
				{
					$profileTranslation->update($profileData);
				}
				else
				{
					ProfileBlockTranslation::create($profileData);
				}
			}

			$response['code'] = Status::SUCCESS;
			$response['msg']  = "Profile [#".$profile->id."] has been updated successfully.";

			return Redirect::to('admin/manage/profile')->with('response', $response);
		}

		$response['code'] = Status::ERROR;
		$response['msg']  = "Unable to update profile.";

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
		$profile  = ProfileBlock::find($id);

		if (isset($profile) && isset($profile->id))
		{
			$profile->delete = true;
			$profile->save();

			$response['code'] = Status::SUCCESS;
			$response['msg']  = "Profile [#".$profile->id."] has been deleted successfully.";
		}
		else
		{
			$response['code'] = Status::ERROR;
			$response['msg']  = "Profile not found.";
		}

		return Redirect::to('admin/manage/profile')->with('response', $response);
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
		$profile  = ProfileBlock::find($id); 

		if (isset($profile) && isset($profile->id))
		{
			$profile->status = Status::INACTIVE;
			$profile->save();

			$response['code'] = Status::SUCCESS;
			$response['msg']  = "Profile [#".$profile->id."] is deactivated successfully.";
		}
		else
		{
			$response['code'] = Status::ERROR;
			$response['msg']  = "Profile not found.";
		}

		return Redirect::to('admin/manage/profile')->with('response', $response);
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
		$profile  = ProfileBlock::find($id);

		if (isset($profile) && isset($profile->id))
		{
			$profile->status = Status::ACTIVE;
			$profile->save();

			$response['code'] = Status::SUCCESS;
			$response['msg']  = "Profile [#".$profile->id."] is activated successfully.";
		}
		else
		{
			$response['code'] = Status::ERROR;
			$response['msg']  = "Profile not found.";
		}

		return Redirect::to('admin/manage/profile')->with('response', $response);
	}

}
