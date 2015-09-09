<?php namespace App\Services;

use DateTime;
use File;
use App\Models\Files;

class FileHelper
{
	public function uploadNewFile($file)
	{
		if ($file->getClientSize() && $file->getClientOriginalName() && $file->getClientMimeType())
		{
			$ext      = $file->getClientOriginalExtension();
			$fileName = $file->getClientOriginalName();
			$baseDir  = '/storage/uploaded'; 
			$date     = new DateTime('now');
			$uId      = $date->format('YmdHis');

			// Save file
			$newFile = new Files;
			$newFile->name = $fileName;
			$newFile->type = $file->getClientMimeType();
			$newFile->dir  = $baseDir."/".$uId."_".$fileName;
			$newFile->save();

			if (!File::exists(public_path().$baseDir))
			{
				File::makeDirectory(public_path().$baseDir);
			}

			$file->move(public_path().$baseDir, $uId."_".$fileName);

			if (File::exists(public_path().$baseDir."/".$uId."_".$fileName) && $newFile->id)
			{
				return $newFile->id;
			}
		}
	}
}