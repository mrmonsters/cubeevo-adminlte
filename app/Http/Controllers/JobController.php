<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Redirect;
use App\Models\Status;
use App\Models\Locale;
use App\Models\JobBlock;
use App\Models\JobBlockTranslation;

class JobController extends Controller {

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
		$jobs = JobBlock::where('delete', '=', false)->orderBy('sort_order')->get();

		return view('management.job.index')->with('jobs', $jobs);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('management.job.create');
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

		if (isset($data))
		{
			$job        = JobBlock::create(array('sort_order' => $data['sort_order']));
			$jobData    = array();
			$attributes = array('title', 'desc', 'qualification');
			$locales    = Locale::where('status', '=', Status::ACTIVE)->get();

			foreach ($locales as $locale)
			{
				$jobData['job_block_id'] = $job->id;
				$jobData['locale_id']    = $locale->id;

				foreach ($attributes as $attribute)
				{
					if (isset($data[$attribute][$locale->id]))
					{
						$jobData[$attribute] = $data[$attribute][$locale->id];
					}
				}

				JobBlockTranslation::create($jobData);
			}

			$response['code'] = Status::SUCCESS;
			$response['msg']  = "Job posting [#".$job->id."] has been created successfully.";

			return Redirect::to('admin/manage/job')->with('response', $response);			
		}

		$response['code'] = Status::ERROR;
		$response['msg']  = "Unable to created new job posting.";

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
		$job = JobBlock::find($id);

		return view('management.job.edit')->with('job', $job);
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
		$job      = JobBlock::find($id);

		if (isset($data) && $job->id)
		{
			$job->sort_order = $data['sort_order'];
			$job->save();

			$jobData    = array();
			$attributes = array('title', 'desc', 'qualification');
			$locales    = Locale::where('status', '=', Status::ACTIVE)->get();

			foreach ($locales as $locale)
			{
				$jobData['job_block_id'] = $job->id;
				$jobData['locale_id']   = $locale->id;

				foreach ($attributes as $attribute)
				{
					if (isset($data[$attribute][$locale->id]))
					{
						$jobData[$attribute] = $data[$attribute][$locale->id];
					}
				}

				$jobTranslation = $job->translations()
					->where('locale_id', $locale->id)
					->first();

				if (isset($jobTranslation))
				{
					$jobTranslation->update($jobData);
				}
				else
				{
					JobBlockTranslation::create($jobData);
				}
			}

			$response['code'] = Status::SUCCESS;
			$response['msg']  = "Job posting [#".$job->id."] has been updated successfully.";

			return Redirect::to('admin/manage/job')->with('response', $response);
		}

		$response['code'] = Status::ERROR;
		$response['msg']  = "Unable to update job posting.";

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
		$job      = JobBlock::find($id);

		if (isset($job) && isset($job->id))
		{
			$job->delete = true;
			$job->save();

			$response['code'] = Status::SUCCESS;
			$response['msg']  = "Job posting [#".$job->id."] has been deleted successfully.";
		}
		else
		{
			$response['code'] = Status::ERROR;
			$response['msg']  = "Job posting not found.";
		}

		return Redirect::to('admin/manage/job')->with('response', $response);
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
		$job      = JobBlock::find($id); 

		if (isset($job) && isset($job->id))
		{
			$job->status = Status::INACTIVE;
			$job->save();

			$response['code'] = Status::SUCCESS;
			$response['msg']  = "Job posting [#".$job->id."] is deactivated successfully.";
		}
		else
		{
			$response['code'] = Status::ERROR;
			$response['msg']  = "Job posting not found.";
		}

		return Redirect::to('admin/manage/job')->with('response', $response);
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
		$job      = JobBlock::find($id);

		if (isset($job) && isset($job->id))
		{
			$job->status = Status::ACTIVE;
			$job->save();

			$response['code'] = Status::SUCCESS;
			$response['msg']  = "Job posting [#".$job->id."] is activated successfully.";
		}
		else
		{
			$response['code'] = Status::ERROR;
			$response['msg']  = "Job posting not found.";
		}

		return Redirect::to('admin/manage/job')->with('response', $response);
	}

}
