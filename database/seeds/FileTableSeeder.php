<?php

use Illuminate\Database\Seeder;
use App\Models\Files;

class FileTableSeeder extends Seeder 
{
	public function run()
	{
		DB::table('files')->delete();

		$files = array(
			array(
				'name'   => 'Hairdepot_Thumbnail',
				'type'   => 'IMAGE/PNG',
				'dir'    => '/img/Credential Thumbnail/Hairdepot_Thumbnail.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'Greenology_Thumbnail',
				'type'   => 'IMAGE/PNG',
				'dir'    => '/img/Credential Thumbnail/Greenology_Thumbnail.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'PLT_Website_Thumbnail',
				'type'   => 'IMAGE/PNG',
				'dir'    => '/img/Credential Thumbnail/PLT_Website_Thumbnail.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'HairMilk_Thumbnail',
				'type'   => 'IMAGE/PNG',
				'dir'    => '/img/Credential Thumbnail/HairMilk_Thumbnail.png',
				'size'   => '0',
				'status' => '2'
			),
		);

		foreach ($files as $file)
		{
			Files::create($file);
		}
	}

}