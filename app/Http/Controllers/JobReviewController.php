<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\JobReviewer;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

}
