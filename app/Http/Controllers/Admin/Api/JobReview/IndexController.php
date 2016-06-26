<?php namespace App\Http\Controllers\Admin\Api\JobReview;

use App\Http\Controllers\Admin\Api\ApiController;
use App\Http\Requests;

use App\Models\JobReviewer;
use App\Models\Locale;
use App\Models\Status;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class IndexController extends ApiController {

	protected $_reviewer;
	protected $_locales;

	protected function _format($collection)
	{
		$result = [];

		if ($collection instanceof Collection) {

			foreach ($collection as $item) {

				$result[$item->id] = [
					'name'          => $item->name,
					'qualification' => $item->qualification,
					'date'          => $item->date,
				];

				foreach ($this->_locales as $locale) {

					foreach ($item->reviews as $review) {

						$result[$item->id][$locale->language][] = [
							'question' => $review->translate($locale->language)->question,
							'answer'   => $review->translate($locale->language)->answer,
						];
					}
				}
			}
		} else if ($collection instanceof JobReviewer) {

			$result = [
				'name'          => $collection->name,
				'qualification' => $collection->qualification,
				'date'          => $collection->date,
			];

			foreach ($this->_locales as $locale) {

				foreach ($collection->reviews as $review) {

					$result[$locale->language][] = [
						'question' => $review->translate($locale->language)->question,
						'answer'   => $review->translate($locale->language)->answer,
					];
				}
			}
		}

		return $result;
	}

	protected function transform(array $item)
	{
		return $item;
	}

	public function __construct(JobReviewer $reviewer, Locale $locale)
	{
		parent::__construct();

		$this->_reviewer = $reviewer;
		$this->_locales  = $locale->where('status', Status::ACTIVE)->get();
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param Request $request
	 *
	 * @return array
	 */
	public function index(Request $request)
	{
		$data = $request->all();

		if (!empty($data['type'])) {

			switch ($data['type']) {

				case 'intern':
					$collection = $this->_reviewer->Intern()->get();
					break;
				case 'fulltime':
					$collection = $this->_reviewer->Fulltime()->get();
					break;
				default:
					$collection = $this->_reviewer->all();
			}
		} else {

			$collection = $this->_reviewer->all();
		}

		return response()->json($this->transformCollection($this->_format($collection)));
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
		$item = $this->_reviewer->findOrNew($id);

		if ($item->exists) {

			return response()->json($this->transform($this->_format($item)));
		}
		
		return response()->json('Reviewer not found.', 422);
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
		$item = $this->_reviewer->findOrNew($id);

		if ($item->exists) {

			$item->delete();

			return response()->json($this->transform($this->_format($item)));
		}

		return response()->json('Reviewer not found.', 422);
	}

}
