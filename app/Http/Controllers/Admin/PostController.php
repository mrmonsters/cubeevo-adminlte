<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App;
use App\Models\Locale;
use App\Models\Post;
use App\Services\FileHelper;

class PostController extends Controller {

	protected $_locales;
	protected $_fileHelper;
	protected $_post;

	/**
	 * Process file upload
	 *
	 * @param Post  $post
	 * @param array $files
	 */
	protected function _processFileUpload(Post &$post, $files = array())
	{
		foreach ($files as $key => $val) {

			switch ($key) {

				case 'cover_image':
					if ($id = $this->_fileHelper->uploadNewFile($val)) {

						$post->file_id = $id;
					}
					break;
				case 'fb_cover':
					if ($id = $this->_fileHelper->uploadNewFile($val)) {

						$post->fb_cover_img_id = $id;
					}
					break;
			}
		}
	}

	public function __construct(FileHelper $fileHelper, Post $post)
	{
		$this->middleware('auth');

		$this->_locales    = Locale::where('status', App\Models\Status::ACTIVE)->get();
		$this->_fileHelper = $fileHelper;
		$this->_post       = $post;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$posts = $this->_post->where('deleted', false)
			->orderBy('created_at', 'DESC')
			->get();

		return view('management.post.index')->with(compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		return view('management.post.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Requests\Admin\BlogPostFormRequest $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function postCreate(Requests\Admin\BlogPostFormRequest $request)
	{
		$data  = $request->all();
		$files = $request->file();
		$post  = new Post();

		$this->_processFileUpload($post, $files);

		foreach ($this->_locales as $index => $locale) {

			App::setLocale($locale->language);

			$post->title       = htmlentities($data['title'][$locale->id]);
			$post->description = htmlentities($data['description'][$locale->id]);
			$post->sort_order  = $data['sort_order'];

			try {

				$post->save();
			} catch (Exception $e) {

				return $this->respondError('admin/manage/post', "Unable to process your request. Please try again. [{$e->getMessage()}]");
			}
		}

		return $this->respondSuccess('admin/manage/post', "Blog post [#".$post->id."] has been created successfully.");
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
	public function getEdit($id)
	{
		$post = $this->_post->find($id);

		if (!$post instanceof Post || !$post->exists) {

			return $this->respondError('/admin/manage/post', "Blog post not found.");
		}

		return view('management.post.edit')->with(compact('post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param                                    $id
	 * @param Requests\Admin\BlogPostFormRequest $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function postUpdate($id, Requests\Admin\BlogPostFormRequest $request)
	{
		$post  = $this->_post->find($id);
		$data  = $request->all();
		$files = $request->file();

		if (!$post instanceof Post || !$post->exists) {

			return $this->respondError('/admin/manage/post', 'Blog post not found.');
		}

		$this->_processFileUpload($post, $files);

		foreach ($this->_locales as $index => $locale) {

			App::setLocale($locale->language);

			$post->title       = htmlentities($data['title'][$locale->id]);
			$post->description = htmlentities($data['description'][$locale->id]);
			$post->sort_order  = $data['sort_order'];

			try {

				$post->save();
			} catch (Exception $e) {

				return $this->respondError('/admin/manage/post', "Unable to process your request. Please try again. [{$e->getMessage()}]");
			}
		}

		return $this->respondSuccess('/admin/manage/post', "Blog post [#{$post->id}] has been updated successfully.");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getDestroy($id)
	{
		$post     = $this->_post->find($id);
		$postData = $post->toArray();

		if (!$post instanceof Post || !$post->exists) {

			$this->respondError('admin/manage/post', "Blog post not found.");
		}

		try {

			$postData['deleted'] = true;

			$this->_post->update($postData);

			return $this->respondSuccess('admin/manage/post', "Blog post [#{$post->id}] has been deleted successfully.");
		} catch (Exception $e) {

			return $this->respondError('admin/manage/post', "Unable to process your request. Please try again. [{$e->getMessage()}]");
		}
	}

	public function getDeactivate($id)
	{
		$post     = $this->_post->find($id);
		$postData = $post->toArray();

		if (!$post instanceof Post || !$post->exists) {

			return $this->respondError('admin/manage/post', 'Blog post not found.');
		}

		$postData['status'] = 1;

		try {

			$this->_post->update($postData);

			return $this->respondSuccess('admin/manage/post', "Blog post [#{$post->id}] is deactivated successfully.");
		} catch (Exception $e) {

			return $this->respondError('admin/manage/post', "Unable to process your request. Please try again. [{$e->getMessage()}]");
		}
	}

	public function getActivate($id)
	{
		$post     = $this->_post->find($id);
		$postData = $post->toArray();

		if (!$post instanceof Post || !$post->exists) {

			return $this->respondError('admin/manage/post', 'Blog post not found.');
		}

		$postData['status'] = 2;

		try {

			$this->_post->update($postData);

			return $this->respondSuccess('admin/manage/post', "Blog post [#{$post->id}] is activated successfully.");
		} catch (Exception $e) {

			return $this->respondError('admin/manage/post', "Unable to process your request. Please try again. [{$e->getMessage()}]");
		}
	}

}
