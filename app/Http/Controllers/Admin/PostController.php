<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App;
use App\Models\Locale;
use App\Models\Post;
use App\Services\FileHelper;

class PostController extends Controller {

	protected $_fileHelper;
	protected $_locales;

	protected function _getFileHelper()
	{
		if (is_null($this->_fileHelper)) {

			$this->_fileHelper = new FileHelper;
		}

		return $this->_fileHelper;
	}

	protected function _getLocales()
	{
		if (is_null($this->_locales)) {

			$this->_locales = Locale::where('status', 2)->get();
		}

		return $this->_locales;
	}

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$posts = Post::where('status', 2)
			->where('deleted', false)
			->orderBy('created_at', 'DESC')
			->get();

		return view('management.post.index')->with('posts', $posts);
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
	 * @return Response
	 */
	public function postCreate(Request $request)
	{
		$data  = $request->input('post');
		$files = $request->file();

		if (isset($files) && !empty($files)) {

			foreach ($files as $key => $val) {

				if ($key == 'cover_image') {

					$coverImageId = $this->_getFileHelper()->uploadNewFile($val);
					break;
				}
			}
		}

		$locales = $this->_getLocales();
		$post    = new Post;

		if (isset($coverImageId)) {

			$post->file_id = $coverImageId;
		}

		foreach ($locales as $index => $locale) {

			App::setLocale($locale->language);

			$post->title       = htmlentities($data['title'][$locale->id]);
			$post->description = htmlentities($data['description'][$locale->id]);
			$post->save();
		}

		if (isset($post) && $post->exists()) {

			$response['code'] = 1;
			$response['msg']  = "Blog post [#".$post->id."] has been created successfully.";
		} else {

			$response['code'] = 0;
			$response['msg']  = "Unable to process your request. Please try again.";
		}

		return redirect('/admin/manage/post')->with('response', $response);
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
		$post = Post::find($id);

		if ($post->exists()) {

			return view('management.post.edit')->with('post', $post);
		} else {

			$response['code'] = 0;
			$response['msg']  = "Blog post not found.";

			return redirect('/admin/manage/post')->with('response', $response);
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postUpdate($id, Request $request)
	{
		$post  = Post::find($id);
		$data  = $request->input('post');
		$files = $request->file();

		if (isset($files) && !empty($files)) {

			foreach ($files as $key => $val) {

				if ($key == 'cover_image') {

					$coverImageId = $this->_getFileHelper()->uploadNewFile($val);
					break;
				}
			}
		}

		$locales = $this->_getLocales();

		if (isset($coverImageId)) {

			$post->file_id = $coverImageId;
		}

		foreach ($locales as $index => $locale) {

			App::setLocale($locale->language);

			$post->title       = htmlentities($data['title'][$locale->id]);
			$post->description = htmlentities($data['description'][$locale->id]);
			$post->save();
		}

		if (isset($post) && $post->exists()) {

			$response['code'] = 1;
			$response['msg']  = "Blog post [#".$post->id."] has been updated successfully.";
		} else {

			$response['code'] = 0;
			$response['msg']  = "Unable to process your request. Please try again.";
		}

		return redirect('/admin/manage/post')->with('response', $response);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getDestroy($id)
	{
		$post     = Post::find($id);
		$response = array();

		if (isset($post) && $post->exists()) {

			$post->deleted = true;
			$post->save();

			$response['code'] = 1;
			$response['msg']  = "Blog post [#".$post->id."] has been deleted successfully.";
		} else {

			$response['code'] = 0;
			$response['msg']  = "Blog post not found.";
		}

		return redirect('admin/manage/post')->with('response', $response);
	}

	public function getDeactivate($id)
	{
		$post     = Post::find($id);
		$response = array();

		if (isset($post) && $post->exists()) {

			$post->status = 1;
			$post->save();

			$response['code'] = 1;
			$response['msg']  = "Blog post [#".$post->id."] is deactivated successfully.";
		} else {

			$response['code'] = 0;
			$response['msg']  = "Blog post not found.";
		}

		return redirect('admin/manage/post')->with('response', $response);
	}

	public function getActivate($id)
	{
		$post     = Post::find($id);
		$response = array();

		if (isset($post) && $post->exists()) {

			$post->status = 2;
			$post->save();

			$response['code'] = 1;
			$response['msg']  = "Blog post [#".$post->id."] is activated successfully.";
		} else {

			$response['code'] = 0;
			$response['msg']  = "Blog post not found.";
		}

		return redirect('admin/manage/post')->with('response', $response);
	}
}
