<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Redirect;

use App\Models\Status;
use App\Models\Setting;
use App\Services\FileHelper;

class SettingController extends Controller {

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
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
	 * @return \Illuminate\View\View
	 */
	public function edit()
	{
		return view('management.setting.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Requests\Admin\SettingFormRequest $request
	 * @param FileHelper                        $fileHelper
	 *
	 * @return mixed
	 */
	public function update(Requests\Admin\SettingFormRequest $request, FileHelper $fileHelper)
	{
		$response = array();
		$data     = $request->input();

		if (isset($data) && !empty($data)) {

			$files = $request->file();

			if (isset($files) && isset($files['new_meta_img_id'])) {

				$metaImgId = $fileHelper->uploadNewFile($files['new_meta_img_id']);
			}

			$settings                     = array();
			$settings['ga_key']           = $data['ga_key'];
			$settings['gmaps_lat']        = $data['gmaps_lat'];
			$settings['gmaps_lng']        = $data['gmaps_lng'];
			$settings['address']          = $data['address'];
			$settings['phone']            = $data['phone'];
			$settings['fax']              = $data['fax'];
			$settings['email']            = $data['email'];
			$settings['facebook_link']    = $data['facebook_link'];
			$settings['youtube_link']     = $data['youtube_link'];
			$settings['instagram_link']   = $data['instagram_link'];
			$settings['twitter_link']     = $data['twitter_link'];
			$settings['google_plus_link'] = $data['google_plus_link'];
			$settings['site_title']       = $data['site_title'];
			$settings['meta_keyword']     = $data['meta_keyword'];
			$settings['meta_desc']        = $data['meta_desc'];
			$settings['meta_img_id']      = (isset($metaImgId) && $metaImgId != '') ? $metaImgId : $data['meta_img_id'];

			foreach ($settings as $key => $val) {

				$config = Setting::where('code', '=', $key)->first();

				if (isset($config)) {

					$config->value = $val;
					$config->save();
				}
			}

			$response['code'] = Status::SUCCESS;
			$response['msg']  = "Settings have been saved successfully.";

			return redirect()->to('admin/manage/setting')->with('response', $response);
		}

		$response['code'] = Status::ERROR;
		$response['msg']  = "Unable to save settings.";

		return redirect()->back()->with('response', $response);
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
