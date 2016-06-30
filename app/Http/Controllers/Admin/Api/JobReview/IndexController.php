<?php namespace App\Http\Controllers\Admin\Api\JobReview;

use App\Http\Controllers\Admin\Api\ApiController;
use App\Http\Requests;

use App;
use App\Models\JobReviewer;
use App\Models\JobReview;
use App\Models\Locale;
use App\Models\Status;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class IndexController extends ApiController {

	protected $_reviewer;
	protected $_review;
	protected $_locales;

	protected function _format($collection)
	{
		$result = [];

		if ($collection instanceof Collection) {

			foreach ($collection as $item) {

				$result[$item->id] = [
					'id'            => $item->id,
					'name'          => $item->name,
					'qualification' => $item->qualification,
					'date'          => $item->date,
					'created_at'    => $item->created_at,
				];

				foreach ($this->_locales as $locale) {

					switch ($locale->language) {

						case 'en':
							$result[$item->id]['reviews'][$locale->language] = $item->enReviews->toArray();
							break;
						case 'cn':
							$result[$item->id]['reviews'][$locale->language] = $item->zhReviews->toArray();
							break;
					}
				}
			}

			$result = array_values($result);
		} else if ($collection instanceof JobReviewer) {

			$result = [
				'id'            => $collection->id,
				'name'          => $collection->name,
				'qualification' => $collection->qualification,
				'date'          => $collection->date,
				'type'          => $collection->type,
			];

			foreach ($this->_locales as $locale) {

				switch ($locale->language) {

					case 'en':
						$result['reviews'][$locale->language] = $collection->enReviews->toArray();
						break;
					case 'cn':
						$result['reviews'][$locale->language] = $collection->zhReviews->toArray();
						break;
				}
			}
		}

		return $result;
	}

	protected function transform(array $item)
	{
		return $item;
	}

	public function __construct(JobReviewer $reviewer, JobReview $review, Locale $locale)
	{
		parent::__construct();

		$this->_reviewer = $reviewer;
		$this->_review   = $review;
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
	 * @param Request $request
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function store(Request $request)
	{
		$data     = $request->all();
		$reviewer = $this->_reviewer->create([
			'name'          => $data['name'],
			'qualification' => $data['qualification'],
			'date'          => $data['date'],
		]);

		if ($reviewer->exists) {

			foreach ($this->_locales as $locale) {

				App::setLocale($locale->language);

				if (!empty($data['reviews'][$locale->language])) {

					foreach ($data['reviews'][$locale->language] as $review) {

						$reviewData = [
							'question' => $review['question'],
							'answer'   => $review['answer'],
							'locale'   => ($locale->language == 'en') ? JobReview::LOCALE_EN : JobReview::LOCALE_ZH,
							'sort'     => $review['sort'],
						];

						$reviewer->reviews()->create($reviewData);
					}
				}
			}

			return response()->json($this->transform($this->_format($reviewer)));
		}

		return response()->json(['msg' => 'Unable to create reviewer.'], 422);
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
	 * @param         $id
	 * @param Request $request
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function update($id, Request $request)
	{
		$data     = $request->all();
		$reviewer = $this->_reviewer->findOrNew($id);
		$data     = json_decode($data['data'], true);

		if ($reviewer->exists) {

			$reviewer->update([
				'name'          => $data['name'],
				'qualification' => $data['qualification'],
				'date'          => $data['date'],
				'type'          => $data['type']['value'],
			]);

			foreach ($this->_locales as $locale) {

				App::setLocale($locale->language);

				if (!empty($data['reviews'][$locale->language])) {

					foreach ($data['reviews'][$locale->language] as $reviewData) {

						if (!empty($reviewData['id'])) { // if id is specified, delete / update

							$review = $this->_review->find($reviewData['id']);

							if (!empty($reviewData['deleted'])) { // delete if 'deleted' flag is specified

								$review->delete();
							} else { // update if 'deleted' flag is not specified

								$review->update($reviewData);
							}
						} else if (empty($reviewData['id'])) { // create new review

							$newReviewData = [
								'question' => $reviewData['question'],
								'answer'   => $reviewData['answer'],
								'locale'   => ($locale->language == 'en') ? JobReview::LOCALE_EN : JobReview::LOCALE_ZH,
								'sort'     => $reviewData['sort'],
							];

							$reviewer->reviews()->create($newReviewData);
						}
					}
				}
			}

			return response()->json($this->transform($this->_format($reviewer)));
		}

		return response()->json(['msg' => 'Reviewer not found.'], 422);
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
