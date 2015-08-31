<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Redirect;

use App\Models\Status;
use App\Models\Setting;

class SettingController extends Controller {

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
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
		//
		$settings = Setting::where('status', '=', STATUS::ACTIVE)->get();

		return view('management.setting.edit')->with('settings', $settings);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $req)
	{
		//
		$response = array();
		$data     = $req->input();

		if (isset($data) && !empty($data))
		{
			$settings = array();
			$settings['ga_key']    = $data['ga_key'];
			$settings['gmaps_lat'] = $data['gmaps_lat'];
			$settings['gmaps_lng'] = $data['gmaps_lng'];
			$settings['address']   = $data['address'];
			$settings['phone']     = $data['phone'];
			$settings['fax']       = $data['fax'];
			$settings['email']     = $data['email'];

			foreach ($settings as $key => $val)
			{
				$config = Setting::where('code', '=', $key)->first();

				if (isset($config))
				{
					$config->value = $val;
					$config->save();
				}
			}

			$response['code'] = STATUS::SUCCESS;
			$response['msg'] = "Settings have been saved successfully.";

			return Redirect::to('admin/manage/setting')->with('response', $response);
		}

		$response['code'] = STATUS::ERROR;
		$response['msg'] = "Unable to save settings.";

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
