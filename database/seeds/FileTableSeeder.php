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
				'type'   => 'image/png',
				'dir'    => '/img/Credential Thumbnail/Hairdepot_Thumbnail.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'Greenology_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Thumbnail/Greenology_Thumbnail.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'PLT_Website_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Thumbnail/PLT_Website_Thumbnail.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'HairMilk_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Thumbnail/HairMilk_Thumbnail.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'solutionIcon1',
				'type'   => 'image/png',
				'dir'    => '/img/solutionIcon1.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'solutionIcon2',
				'type'   => 'image/png',
				'dir'    => '/img/solutionIcon2.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'solutionIcon3',
				'type'   => 'image/png',
				'dir'    => '/img/solutionIcon3.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'solutionIcon4',
				'type'   => 'image/png',
				'dir'    => '/img/solutionIcon4.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'solutionIcon5',
				'type'   => 'image/png',
				'dir'    => '/img/solutionIcon5.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'solutionIcon6',
				'type'   => 'image/png',
				'dir'    => '/img/solutionIcon6.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'solutionIcon7',
				'type'   => 'image/png',
				'dir'    => '/img/solutionIcon7.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'solutionIcon8',
				'type'   => 'image/png',
				'dir'    => '/img/solutionIcon8.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'solutionIcon9',
				'type'   => 'image/png',
				'dir'    => '/img/solutionIcon9.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'Images-36',
				'type'   => 'image/png',
				'dir'    => '/img/Images-36.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'Hairdepot_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Thumbnail/Hairdepot_Thumbnail_Background.jpg',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'Greenology_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Thumbnail/Greenology_Thumbnail_Background.jpg',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'PLT_Website_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Thumbnail/PLT_Website_Thumbnail_Background.jpg',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'HairMilk_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Thumbnail/HairMilk_Thumbnail_Background.jpg',
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