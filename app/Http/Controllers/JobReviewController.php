<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\JobReviewer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Status;
use Redirect;

class JobReviewController extends Controller {

	protected $_reviewer;

	public function __construct(JobReviewer $jobReviewer)
	{
		$this->middleware('auth');

		$this->_reviewer = $jobReviewer;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('management.review.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('management.review.create');
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
	public function edit($id)
	{
		$reviewer = $this->_reviewer->findOrNew($id);

		if ($reviewer->exists) {

			$reviewerData                  = $reviewer->toArray();
			$reviewerData['type']          = ['value' => $reviewer['type']];
			$reviewerData['reviews']['en'] = $reviewer->enReviews->toArray();
			$reviewerData['reviews']['cn'] = $reviewer->zhReviews->toArray();

			return view('management.review.edit')->with(compact('reviewerData'));
		}

		return $this->respondError('admin/manage/job-review', 'Reviewer not found.');
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
		$job      = $this->_reviewer->find($id);

		if (isset($job) && isset($job->id))
		{
			$job->status = Status::INACTIVE;
			$job->save();

			$response['code'] = Status::SUCCESS;
			$response['msg']  = "Job Review [#".$job->id."] is deactivated successfully.";
		}
		else
		{
			$response['code'] = Status::ERROR;
			$response['msg']  = "Job review not found.";
		}

		return Redirect::to('admin/manage/job-review')->with('response', $response);
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
		$job      = $this->_reviewer->find($id);

		if (isset($job) && isset($job->id))
		{
			$job->status = Status::ACTIVE;
			$job->save();

			$response['code'] = Status::SUCCESS;
			$response['msg']  = "Job review [#".$job->id."] is activated successfully.";
		}
		else
		{
			$response['code'] = Status::ERROR;
			$response['msg']  = "Job review not found.";
		}

		return Redirect::to('admin/manage/job-review')->with('response', $response);
	}

}
