<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Files;
use File;

class FileController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$files = Files::all();

		return view('management\file\index')
			->with('files', $files);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('management\file\create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $req)
	{
		//
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
					$ext = $file->getClientOriginalExtension();
					$fileName = ($req->input('file_name')) ? $req->input('file_name').".".$ext : $file->getClientOriginalName();
					$baseDir = ($req->input('base_dir')) ? "/storage/".$req->input('base_dir') : '/storage/uploaded'; 

					// Save file
					$newFile = new Files;
					$newFile->file_name = $fileName;
					$newFile->file_type = $file->getClientMimeType();
					$newFile->file_dir = $baseDir."/".$fileName;
					$newFile->file_size = $file->getClientSize();
					$newFile->status = 2;
					$newFile->save();

					if (!File::exists(public_path().$baseDir))
					{
						File::makeDirectory(public_path().$baseDir);
					}

					$file->move(public_path().$baseDir, $fileName);

					if (File::exists(public_path().$baseDir."/".$fileName))
					{
						$msg = 'New file(s) is uploaded successfully.';
					}
					else
					{
						$msg = 'Failed to upload file(s).';
						break;
					}
				}
			}
		}

		return redirect('/manage/file')->with('session_msg', $msg);
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

		if (in_array($file->file_type, $imgTypes))
		{
			$isImage = true;
		}
		else if (in_array($file->file_type, $docTypes))
		{
			$isDocument = true;
		}

		return view('management/file/edit')
			->with('file', $file)
			->with('isImage', $isImage)
			->with('isDocument, $isDocument');
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
		$data = $req->input();
		$file = Files::find($id);
		
		if (!$file->isEmpty())
		{
			$rawOldFileDir = str_replace($file->file_name, '', $file->file_dir);
			$rawNewFileDir = str_replace($data['file_name'], '', $data['file_dir']);

			if (!strcmp($rawOldFileDir, $rawNewFileDir))
			{
				if (!File::exists(public_path().$rawNewFileDir))
				{
					File::makeDirectory(public_path().$rawNewFileDir);
				}

				File::move(public_path().$file->file_dir, public_path().$rawNewFileDir.$data['file_name']);
			}
			
			$file->file_name = $data['file_name'];
			$file->file_dir = $data['file_dir'];
			
			if ($file->save())
			{
				$msg = 'Changes are saved successfully.';
			}
			else
			{
				$msg = 'Failed to save changes.';
			}
		}

		return redirect('/manage/file')->with('session_msg', $msg);
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
