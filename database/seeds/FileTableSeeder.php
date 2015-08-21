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
			array(
				'name'   => 'solutionIcon1',
				'type'   => 'IMAGE/PNG',
				'dir'    => '/img/solutionIcon1.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'solutionIcon2',
				'type'   => 'IMAGE/PNG',
				'dir'    => '/img/solutionIcon2.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'solutionIcon3',
				'type'   => 'IMAGE/PNG',
				'dir'    => '/img/solutionIcon3.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'solutionIcon4',
				'type'   => 'IMAGE/PNG',
				'dir'    => '/img/solutionIcon4.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'solutionIcon5',
				'type'   => 'IMAGE/PNG',
				'dir'    => '/img/solutionIcon5.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'solutionIcon6',
				'type'   => 'IMAGE/PNG',
				'dir'    => '/img/solutionIcon6.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'solutionIcon7',
				'type'   => 'IMAGE/PNG',
				'dir'    => '/img/solutionIcon7.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'solutionIcon8',
				'type'   => 'IMAGE/PNG',
				'dir'    => '/img/solutionIcon8.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'solutionIcon9',
				'type'   => 'IMAGE/PNG',
				'dir'    => '/img/solutionIcon9.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'Images-36',
				'type'   => 'IMAGE/PNG',
				'dir'    => '/img/Images-36.png',
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