<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Redirect;
use DateTime;
use App\Models\Status;
use App\Models\Files;
use File;

class FileController extends Controller {

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
		$files = Files::where('delete', '=', false)->get();

		return view('management.file.index')->with('files', $files);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('management.file.create');
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
		$files = $req->file();
		
		if (!empty($files))
		{
			foreach ($files as $file)
			{
				if (!$file->getClientSize() || !$file->getClientOriginalName() || !$file->getClientMimeType())
				{
					continue;
				}
				else
				{
					$ext      = $file->getClientOriginalExtension();
					$fileName = ($req->input('name')) ? $req->input('name').".".$ext : $file->getClientOriginalName();
					$baseDir  = ($req->input('base_dir')) ? "/storage/".$req->input('base_dir') : '/storage/uploaded'; 
					$date     = new DateTime('now');
					$uId      = $date->format('YmdHis');

					// Save file
					$newFile = new Files;
					$newFile->name   = $fileName;
					$newFile->type   = $file->getClientMimeType();
					$newFile->dir    = $baseDir."/".$uId."_".$fileName;
					$newFile->status = 2;
					$newFile->save();

					if (!File::exists(public_path().$baseDir))
					{
						File::makeDirectory(public_path().$baseDir);
					}

					$file->move(public_path().$baseDir, $uId."_".$fileName);

					if (File::exists(public_path().$baseDir."/".$uId."_".$fileName))
					{
						$response['code'] = Status::SUCCESS;
						$response['msg']  = 'New file(s) has been uploaded successfully.';
					}
					else
					{
						$response['code'] = Status::ERROR;
						$response['msg']  = 'Unable to upload file(s).';
						break;
					}
				}
			}
		}

		return Redirect::to('admin/manage/file')->with('response', $response);
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
		$imgTypes = array(
			'image/jpeg',
			'image/png',
			'image/gif'
		);
		$docTypes = array(
			'application/pdf'
		);

		$isImage = false;
		$isDocument = false;
		$file = Files::find($id);

		if (in_array($file->type, $imgTypes))
		{
			$isImage = true;
		}
		else if (in_array($file->type, $docTypes))
		{
			$isDocument = true;
		}

		return view('management.file.view')
			->with('file', $file)
			->with('isImage', $isImage)
			->with('isDocument', $isDocument);
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
	public function update(Request $req, $id)
	{
		//
		$response = array();
		$data = $req->input();
		$file = Files::find($id);
		
		if (!$file->isEmpty())
		{
			$rawOldFileDir = str_replace($file->name, '', $file->dir);
			$rawNewFileDir = str_replace($data['file_name'], '', $data['file_dir']);

			if (!strcmp($rawOldFileDir, $rawNewFileDir))
			{
				if (!File::exists(public_path().$rawNewFileDir))
				{
					File::makeDirectory(public_path().$rawNewFileDir);
				}

				File::move(public_path().$file->dir, public_path().$rawNewFileDir.$data['name']);
			}
			
			$file->name = $data['name'];
			$file->dir  = $data['dir'];
			
			if ($file->save())
			{
				$response['code'] = Status::SUCCESS;
				$response['msg']  = 'File [#'.$file->id.'] has been updated successfully.';
			}
			else
			{
				$response['code'] = Status::ERROR;
				$response['msg']  = 'Unable to update file.';
			}
		}

		return Redirect::to('admin/manage/file')->with('response', $response);
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
		$file     = Files::find($id);

		if (isset($file) && isset($file->id))
		{
			$file->delete = true;
			$file->save();

			$response['code'] = Status::SUCCESS;
			$response['msg']  = "File [#".$file->id."] has been deleted successfully.";
		}
		else
		{
			$response['code'] = Status::ERROR;
			$response['msg']  = "File not found.";
		}

		return Redirect::to('admin/manage/file')->with('response', $response);
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
		$file     = Files::find($id); 

		if (isset($file) && isset($file->id))
		{
			$file->status = Status::INACTIVE;
			$file->save();

			$response['code'] = Status::SUCCESS;
			$response['msg']  = "File [#".$file->id."] is deactivated successfully.";
		}
		else
		{
			$response['code'] = Status::ERROR;
			$response['msg']  = "File not found.";
		}

		return Redirect::to('admin/manage/file')->with('response', $response);
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
		$file     = Files::find($id);

		if (isset($file) && isset($file->id))
		{
			$file->status = Status::ACTIVE;
			$file->save();

			$response['code'] = Status::SUCCESS;
			$response['msg']  = "File [#".$file->id."] is activated successfully.";
		}
		else
		{
			$response['code'] = Status::ERROR;
			$response['msg']  = "File not found.";
		}

		return Redirect::to('admin/manage/file')->with('response', $response);
	}

}
