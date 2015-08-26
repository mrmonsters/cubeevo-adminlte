<?php

use Illuminate\Database\Seeder;
use App\Models\Locale;
use App\Models\Files;
use App\Models\Entity;
use App\Models\EntityInstance;
use App\Models\EntityChild;
use App\Models\Attribute;
use App\Models\AttributeValue;

class ProjectTableSeeder extends Seeder 
{
	public function run()
	{
		$lastFileId = ($id = Files::where('status', '=', '2')->get()->last()->id) ? $id : 0;

		$files = array(
			array(
				'name'   => 'apu_logo',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Automotive/World Top/Thumbnail/apu_logo.jpg',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'WorldTop_Thumbnail',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Automotive/World Top/Thumbnail/WorldTop_Thumbnail.jpg',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'       => 'WorldTop_Billboard_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Automotive/World Top/Full Width/WorldTop_Billboard_1920.jpg',
				'size'       => '0',
				'sort_order' => '0',
				'status'     => '2'
			),
			array(
				'name'       => 'WorldTop_Billboard_2012_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Automotive/World Top/Full Width/WorldTop_Billboard_2012_1920.jpg',
				'size'       => '0',
				'sort_order' => '1',
				'status'     => '2'
			),
			array(
				'name'       => 'WorldTop_Flyer_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Automotive/World Top/Full Width/WorldTop_Flyer_1920.jpg',
				'size'       => '0',
				'sort_order' => '2',
				'status'     => '2'
			),
			array(
				'name'   => 'RHB_FunFacts_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Thumbnail/RHB_FunFacts_Thumbnail.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'RHB_FunFacts_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Thumbnail/RHB_FunFacts_Thumbnail_Background.jpg',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'       => 'FunFacts_Cover_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Full Width/FunFacts_Cover_1920.jpg',
				'size'       => '0',
				'sort_order' => '0',
				'status'     => '2'
			),
			array(
				'name'       => 'FunFacts_Music_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Full Width/FunFacts_Music_01_1920.jpg',
				'size'       => '0',
				'sort_order' => '1',
				'status'     => '2'
			),
			array(
				'name'       => 'FunFacts_Music_19',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Full Width/FunFacts_Music_1920.jpg',
				'size'       => '0',
				'sort_order' => '2',
				'status'     => '2'
			),
			array(
				'name'       => 'FunFacts_Onion_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Full Width/FunFacts_Onion_01_1920.jpg',
				'size'       => '0',
				'sort_order' => '3',
				'status'     => '2'
			),
			array(
				'name'       => 'FunFacts_Onion_02_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Full Width/FunFacts_Onion_02_1920.jpg',
				'size'       => '0',
				'sort_order' => '4',
				'status'     => '2'
			),
			array(
				'name'       => 'FunFacts_Onion_03_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Full Width/FunFacts_Onion_03_1920.jpg',
				'size'       => '0',
				'sort_order' => '5',
				'status'     => '2'
			),
			array(
				'name'       => 'FunFacts_Onion_04_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Full Width/FunFacts_Onion_04_1920.jpg',
				'size'       => '0',
				'sort_order' => '6',
				'status'     => '2'
			),
			array(
				'name'       => 'FunFacts_Recycling_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Full Width/FunFacts_Recycling_01_1920.jpg',
				'size'       => '0',
				'sort_order' => '7',
				'status'     => '2'
			),
			array(
				'name'       => 'FunFacts_Recycling_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Full Width/FunFacts_Recycling_1920.jpg',
				'size'       => '0',
				'sort_order' => '8',
				'status'     => '2'
			),
			array(
				'name'       => 'FunFacts_Spider_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Full Width/FunFacts_Spider_01_1920.jpg',
				'size'       => '0',
				'sort_order' => '9',
				'status'     => '2'
			),
			array(
				'name'       => 'FunFacts_Spider_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Full Width/FunFacts_Spider_1920.jpg',
				'size'       => '0',
				'sort_order' => '10',
				'status'     => '2'
			),
			array(
				'name'       => 'FunFacts_VaticanCity_02_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Full Width/FunFacts_VaticanCity_02_1920.jpg',
				'size'       => '0',
				'sort_order' => '11',
				'status'     => '2'
			),
			array(
				'name'       => 'FunFacts_VaticanCity_03_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Full Width/FunFacts_VaticanCity_03_1920.jpg',
				'size'       => '0',
				'sort_order' => '12',
				'status'     => '2'
			),
			array(
				'name'       => 'FunFacts_VaticanCity_04_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Full Width/FunFacts_VaticanCity_04_1920.jpg',
				'size'       => '0',
				'sort_order' => '13',
				'status'     => '2'
			),
			array(
				'name'   => 'RHB_WOTD_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Portfolio/Banking/RHB/WOTD/Thumbnail/RHB_WOTD_Thumbnail.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'RHB_WOTD_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Banking/RHB/WOTD/Thumbnail/RHB_WOTD_Thumbnail_Background.jpg',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'       => 'WOTD_Cover_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_Cover_1920.jpg',
				'size'       => '0',
				'sort_order' => '0',
				'status'     => '2'
			),
			array(
				'name'       => 'WOTD_Accept&Except_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_Accept&Except_01_1920.jpg',
				'size'       => '0',
				'sort_order' => '0',
				'status'     => '2'
			),
			array(
				'name'       => 'WOTD_Accept&Except_02_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_Accept&Except_02_1920.jpg',
				'size'       => '0',
				'sort_order' => '1',
				'status'     => '2'
			),
			array(
				'name'       => 'WOTD_Accept&Except_03_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_Accept&Except_03_1920.jpg',
				'size'       => '0',
				'sort_order' => '2',
				'status'     => '2'
			),
			array(
				'name'       => 'WOTD_Accept&Except_04_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_Accept&Except_04_1920.jpg',
				'size'       => '0',
				'sort_order' => '3',
				'status'     => '2'
			),
			array(
				'name'       => 'WOTD_College&Collage_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_College&Collage_01_1920.jpg',
				'size'       => '0',
				'sort_order' => '4',
				'status'     => '2'
			),
			array(
				'name'       => 'WOTD_College&Collage_02_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_College&Collage_02_1920.jpg',
				'size'       => '0',
				'sort_order' => '3',
				'status'     => '2'
			),
			array(
				'name'       => 'WOTD_College&Collage_03_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_College&Collage_03_1920.jpg',
				'size'       => '0',
				'sort_order' => '4',
				'status'     => '2'
			),
			array(
				'name'       => 'WOTD_Complement&Compliment_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_Complement&Compliment_01_1920.jpg',
				'size'       => '0',
				'sort_order' => '5',
				'status'     => '2'
			),
			array(
				'name'       => 'WOTD_Complement&Compliment_02_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_Complement&Compliment_02_1920.jpg',
				'size'       => '0',
				'sort_order' => '6',
				'status'     => '2'
			),
			array(
				'name'       => 'WOTD_Complement&Compliment_03_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_Complement&Compliment_03_1920.jpg',
				'size'       => '0',
				'sort_order' => '7',
				'status'     => '2'
			),
			array(
				'name'       => 'WOTD_Complement&Compliment_04_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_Complement&Compliment_04_1920.jpg',
				'size'       => '0',
				'sort_order' => '8',
				'status'     => '2'
			),
			array(
				'name'       => 'WOTD_Message&Massage_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_Message&Massage_1920.jpg',
				'size'       => '0',
				'sort_order' => '9',
				'status'     => '2'
			),
			array(
				'name'       => 'WOTD_Message&Massage_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_Message&Massage_01_1920.jpg',
				'size'       => '0',
				'sort_order' => '10',
				'status'     => '2'
			),
			array(
				'name'       => 'WOTD_Whether&Weather_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_Whether&Weather_1920.jpg',
				'size'       => '0',
				'sort_order' => '11',
				'status'     => '2'
			),
			array(
				'name'       => 'WOTD_Whether&Weather_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_Whether&Weather_01_1920.jpg',
				'size'       => '0',
				'sort_order' => '12',
				'status'     => '2'
			),
			array(
				'name'   => 'Sunshine_Website_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Portfolio/Beauty/Sunshine/Thumbnail/Sunshine_Website_Thumbnail.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'Sunshine_Website_Thumbnail',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Beauty/Sunshine/Thumbnail/Sunshine_Website_Thumbnail.jpg',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'       => 'Sunshine_Website_01',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Beauty/Sunshine/Full Width/Sunshine_Website_01.jpg',
				'size'       => '0',
				'sort_order' => '',
				'status'     => '2'
			),
			array(
				'name'       => 'Sunshine_Website_02',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Beauty/Sunshine/Full Width/Sunshine_Website_02.jpg',
				'size'       => '0',
				'sort_order' => '1',
				'status'     => '2'
			),
			array(
				'name'       => 'Sunshine_Website_03',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Beauty/Sunshine/Full Width/Sunshine_Website_03.jpg',
				'size'       => '0',
				'sort_order' => '2',
				'status'     => '2'
			),
			array(
				'name'       => 'Sunshine_Website_04',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Beauty/Sunshine/Full Width/Sunshine_Website_04.jpg',
				'size'       => '0',
				'sort_order' => '3',
				'status'     => '2'
			),
			array(
				'name'   => 'Fortson_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Portfolio/Developer/Fortson/Thumbnail/Fortson_Thumbnail.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'Fortson_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Developer/Fortson/Thumbnail/Fortson_Thumbnail_Background.jpg',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'       => 'Fortson_Cover_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Developer/Fortson/Full Width/Fortson_Cover_1920.jpg',
				'size'       => '0',
				'sort_order' => '0',
				'status'     => '2'
			),
			array(
				'name'       => 'Fortson_Branding_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Developer/Fortson/Full Width/Fortson_Branding_1920.jpg',
				'size'       => '0',
				'sort_order' => '1',
				'status'     => '2'
			),
			array(
				'name'       => 'Fortson_Branding_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Developer/Fortson/Full Width/Fortson_Branding_01_1920.jpg',
				'size'       => '0',
				'sort_order' => '2',
				'status'     => '2'
			),
			array(
				'name'       => 'Fortson_Website_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Developer/Fortson/Full Width/Fortson_Website_01_1920.jpg',
				'size'       => '0',
				'sort_order' => '3',
				'status'     => '2'
			),
			array(
				'name'       => 'Fortson_Website_03_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Developer/Fortson/Full Width/Fortson_Website_03_1920.jpg',
				'size'       => '0',
				'sort_order' => '4',
				'status'     => '2'
			),
			array(
				'name'   => 'Globbykidz_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Portfolio/Education/Globbykidz/Thumbnail/Globbykidz_Thumbnail.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'Globbykidz_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Education/Globbykidz/Thumbnail/Globbykidz_Thumbnail_Background.jpg',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'       => 'GlobbyKids_Cover_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Education/Globbykidz/Full Width/GlobbyKids_Cover_1920.jpg',
				'size'       => '0',
				'sort_order' => '0',
				'status'     => '2'
			),
			array(
				'name'       => 'GlobbyKidz_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Education/Globbykidz/Full Width/GlobbyKidz_01_1920.jpg',
				'size'       => '0',
				'sort_order' => '1',
				'status'     => '2'
			),
			array(
				'name'       => 'GlobbyKidz_02_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Education/Globbykidz/Full Width/GlobbyKidz_02_1920.jpg',
				'size'       => '0',
				'sort_order' => '2',
				'status'     => '2'
			),
			array(
				'name'       => 'Globbykidz_BrandManual_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Education/Globbykidz/Full Width/Globbykidz_BrandManual_01_1920.jpg',
				'size'       => '0',
				'sort_order' => '3',
				'status'     => '2'
			),
			array(
				'name'       => 'Globbykidz_BrandManual_02_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Education/Globbykidz/Full Width/Globbykidz_BrandManual_02_1920.jpg',
				'size'       => '0',
				'sort_order' => '4',
				'status'     => '2'
			),
			array(
				'name'       => 'Globbykidz_BrandManual_03_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Education/Globbykidz/Full Width/Globbykidz_BrandManual_03_1920.jpg',
				'size'       => '0',
				'sort_order' => '5',
				'status'     => '2'
			),
			array(
				'name'       => 'Globbykidz_Report_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Education/Globbykidz/Full Width/Globbykidz_Report_01_1920.jpg',
				'size'       => '0',
				'sort_order' => '6',
				'status'     => '2'
			),
			array(
				'name'       => 'Globbykidz_Report_02_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Education/Globbykidz/Full Width/Globbykidz_Report_02_1920.jpg',
				'size'       => '0',
				'sort_order' => '7',
				'status'     => '2'
			),
			array(
				'name'       => 'Globbykidz_Report_03_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Education/Globbykidz/Full Width/Globbykidz_Report_03_1920.jpg',
				'size'       => '0',
				'sort_order' => '8',
				'status'     => '2'
			),
			array(
				'name'       => 'GlobbyKidz_Banner_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Education/Globbykidz/Full Width/GlobbyKidz_Banner_1920.jpg',
				'size'       => '0',
				'sort_order' => '9',
				'status'     => '2'
			),
			array(
				'name'       => 'GlobbyKidz_Flyer_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Education/Globbykidz/Full Width/GlobbyKidz_Flyer_1920.jpg',
				'size'       => '0',
				'sort_order' => '10',
				'status'     => '2'
			),
			array(
				'name'   => 'Kostka_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Portfolio/Education/Kostka/Thumbnail/Kostka_Thumbnail.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'Kostka_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Education/Kostka/Thumbnail/Kostka_Thumbnail_Background.jpg',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'       => 'Kostka_Branding_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Education/Kostka/Full Width/Kostka_Branding_01_1920.jpg',
				'size'       => '0',
				'sort_order' => '9',
				'status'     => '2'
			),
			array(
				'name'       => 'Kostka_Branding_05_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Education/Kostka/Full Width/Kostka_Branding_05_1920.jpg',
				'size'       => '0',
				'sort_order' => '10',
				'status'     => '2'
			),
			array(
				'name'   => 'Auric_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Portfolio/F&B/Auric Pacific/Thumbnail/Auric_Thumbnail.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'Auric_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/F&B/Auric Pacific/Thumbnail/Auric_Thumbnail_Background.jpg',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'       => 'Auric_Cover_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Auric Pacific/Full Width/Auric_Cover_1920.jpg',
				'size'       => '0',
				'sort_order' => '0',
				'status'     => '2'
			),
			array(
				'name'       => 'Auric_Poster_2014_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Auric Pacific/Full Width/Auric_Poster_2014_1920.jpg',
				'size'       => '0',
				'sort_order' => '1',
				'status'     => '2'
			),
			array(
				'name'       => 'Auric_Booth_2015_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Auric Pacific/Full Width/Auric_Booth_2015_1920.jpg',
				'size'       => '0',
				'sort_order' => '2',
				'status'     => '2'
			),
			array(
				'name'       => 'Auric_Brochure_2013_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Auric Pacific/Full Width/Auric_Brochure_2013_1920.jpg',
				'size'       => '0',
				'sort_order' => '3',
				'status'     => '2'
			),
			array(
				'name'       => 'Auric_Brochure_2013_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Auric Pacific/Full Width/Auric_Brochure_2013_01_1920.jpg',
				'size'       => '0',
				'sort_order' => '4',
				'status'     => '2'
			),
			array(
				'name'       => 'Auric_Brochure_2014_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Auric Pacific/Full Width/Auric_Brochure_2014_1920.jpg',
				'size'       => '0',
				'sort_order' => '5',
				'status'     => '2'
			),
			array(
				'name'       => 'Auric_Brochure_2014_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Auric Pacific/Full Width/Auric_Brochure_2014_01_1920.jpg',
				'size'       => '0',
				'sort_order' => '6',
				'status'     => '2'
			),
			array(
				'name'       => 'Auric_Brochure_2015_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Auric Pacific/Full Width/Auric_Brochure_2015_1920.jpg',
				'size'       => '0',
				'sort_order' => '7',
				'status'     => '2'
			),
			array(
				'name'       => 'Auric_Brochure_2015_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Auric Pacific/Full Width/Auric_Brochure_2015_01_1920.jpg',
				'size'       => '0',
				'sort_order' => '8',
				'status'     => '2'
			),
			array(
				'name'       => 'Auric_Bunting_2013_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Auric Pacific/Full Width/Auric_Bunting_2013_1920.jpg',
				'size'       => '0',
				'sort_order' => '9',
				'status'     => '2'
			),
			array(
				'name'       => 'Auric_Bunting_2013_1920_01',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Auric Pacific/Full Width/Auric_Bunting_2013_1920_01.jpg',
				'size'       => '0',
				'sort_order' => '10',
				'status'     => '2'
			),
			array(
				'name'       => 'Auric_Bunting_2014_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Auric Pacific/Full Width/Auric_Bunting_2014_1920.jpg',
				'size'       => '0',
				'sort_order' => '11',
				'status'     => '2'
			),
			array(
				'name'       => 'Auric_Bunting_2014_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Auric Pacific/Full Width/Auric_Bunting_2014_01_1920.jpg',
				'size'       => '0',
				'sort_order' => '12',
				'status'     => '2'
			),
			array(
				'name'       => 'Auric_Bunting_2015_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Auric Pacific/Full Width/Auric_Bunting_2015_1920.jpg',
				'size'       => '0',
				'sort_order' => '13',
				'status'     => '2'
			),
			array(
				'name'   => 'LianSin_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Portfolio/F&B/Lian Sin/Thumbnail/LianSin_Thumbnail.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'LianSin_Thumbnail',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/F&B/Lian Sin/Thumbnail/LianSin_Thumbnail.jpg',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'       => 'LianSin_Cover_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Lian Sin/Full Width/LianSin_Cover_1920.jpg',
				'size'       => '0',
				'sort_order' => '0',
				'status'     => '2'
			),
			array(
				'name'       => 'Butterfly_Packaging_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Lian Sin/Full Width/Butterfly_Packaging_1920.jpg',
				'size'       => '0',
				'sort_order' => '1',
				'status'     => '2'
			),
			array(
				'name'       => 'Butterfly_RedPacket_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Lian Sin/Full Width/Butterfly_RedPacket_1920.jpg',
				'size'       => '0',
				'sort_order' => '2',
				'status'     => '2'
			),
			array(
				'name'       => 'CapAmoi_Poster_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Lian Sin/Full Width/CapAmoi_Poster_1920.jpg',
				'size'       => '0',
				'sort_order' => '3',
				'status'     => '2'
			),
			array(
				'name'       => 'CapAmoi_PressAd_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Lian Sin/Full Width/CapAmoi_PressAd_1920.jpg',
				'size'       => '0',
				'sort_order' => '4',
				'status'     => '2'
			),
			array(
				'name'       => 'Chrysanthemum_Packaging_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Lian Sin/Full Width/Chrysanthemum_Packaging_1920.jpg',
				'size'       => '0',
				'sort_order' => '5',
				'status'     => '2'
			),
			array(
				'name'       => 'LianSin_Raya_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Lian Sin/Full Width/LianSin_Raya_1920.jpg',
				'size'       => '0',
				'sort_order' => '6',
				'status'     => '2'
			),
			array(
				'name'       => 'MrThai_Packaging_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Lian Sin/Full Width/MrThai_Packaging_1920.jpg',
				'size'       => '0',
				'sort_order' => '7',
				'status'     => '2'
			),
			array(
				'name'   => 'TK_Website_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Portfolio/F&B/TK/Thumbnail/TK_Website_Thumbnail.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'TK_Website_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/F&B/TK/Thumbnail/TK_Website_Thumbnail_Background.jpg',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'       => 'TK_Website_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/TK/Full Width/TK_Website_1920.jpg',
				'size'       => '0',
				'sort_order' => '0',
				'status'     => '2'
			),
			array(
				'name'       => 'TK_Website_02_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/TK/Full Width/TK_Website_02_1920.jpg',
				'size'       => '0',
				'sort_order' => '1',
				'status'     => '2'
			),
			array(
				'name'       => 'TK_Website_03_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/TK/Full Width/TK_Website_03_1920.jpg',
				'size'       => '0',
				'sort_order' => '2',
				'status'     => '2'
			),
			array(
				'name'       => 'TK_Website_04_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/TK/Full Width/TK_Website_04_1920.jpg',
				'size'       => '0',
				'sort_order' => '3',
				'status'     => '2'
			),
			array(
				'name'       => 'TK_Website_05_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/TK/Full Width/TK_Website_05_1920.jpg',
				'size'       => '0',
				'sort_order' => '4',
				'status'     => '2'
			),
			array(
				'name'   => 'IP_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Portfolio/IT/IP Server One/Thumbnail/IP_Thumbnail.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'IP_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/IT/IP Server One/Thumbnail/IP_Thumbnail_Background.jpg',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'PLT_Website_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Portfolio/IT/PLT/Thumbnail/PLT_Website_Thumbnail.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'PLT_Website_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/IT/PLT/Thumbnail/PLT_Website_Thumbnail_Background.jpg',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'Greenology_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Portfolio/Retailer/Greenology/Thumbnail/Greenology_Thumbnail.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'Greenology_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Greenology/Thumbnail/Greenology_Thumbnail_Background.jpg',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'HairMilk_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Portfolio/Retailer/Hair Milk/Thumbnail/HairMilk_Thumbnail.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'HairMilk_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Hair Milk/Thumbnail/HairMilk_Thumbnail_Background.jpg',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'Hairdepot_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Portfolio/Retailer/Hairdepot/Thumbnail/Hairdepot_Thumbnail.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'Hairdepot_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Hairdepot/Thumbnail/Hairdepot_Thumbnail_Background.jpg',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'Midori_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Portfolio/Retailer/Midori/Thumbnail/Midori_Thumbnail.png',
				'size'   => '0',
				'status' => '2'
			),
			array(
				'name'   => 'Midori_Thumbnail',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Midori/Thumbnail/Midori_Thumbnail.jpg',
				'size'   => '0',
				'status' => '2'
			),
		);

		foreach ($files as $file)
		{
			Files::create($file);
		}

		$lastInstanceId = ($id = EntityInstance::where('status', '=', '2')->get()->last()->id) ? $id : 0;
		$baseInstanceId = $lastInstanceId;

		$instance = array(
			'entity_id' => '2',
			'status'    => '2'
		);

		for ($i = 0; $i < 16; $i++)
		{
			EntityInstance::create($instance);
		}

		$projects = array(
			array(
				'name' => array(
					'cn' => 'World Top',
				),
				'desc' => array(
					'cn' => 'World Top description.',
				),
				'img_count' => 3,
			),
			array(
				'name' => array(
					'cn' => 'Fun Facts (RHB)',
				),
				'desc' => array(
					'cn' => 'Fun Facts (RHB) description.',
				),
				'img_count' => 14,
			),
			array(
				'name' => array(
					'cn' => 'WOTD (RHB)',
				),
				'desc' => array(
					'cn' => 'WOTD (RHB) description.',
				),
				'img_count' => 16,
			),
			array(
				'name' => array(
					'cn' => 'Sunshine',
				),
				'desc' => array(
					'cn' => 'Sunshine description.',
				),
				'img_count' => 4,
			),
			array(
				'name' => array(
					'cn' => 'Fortson',
				),
				'desc' => array(
					'cn' => 'Fortson description.',
				),
				'img_count' => 5,
			),
			array(
				'name' => array(
					'cn' => 'Globbykidz',
				),
				'desc' => array(
					'cn' => 'Globbykidz description.',
				),
				'img_count' => 11,
			),
			array(
				'name' => array(
					'cn' => 'Kostka',
				),
				'desc' => array(
					'cn' => 'Kostka description.',
				),
				'img_count' => 2,
			),
			array(
				'name' => array(
					'cn' => 'Auric Pacific',
				),
				'desc' => array(
					'cn' => 'Auric Pacific description.',
				),
				'img_count' => 14,
			),
			array(
				'name' => array(
					'cn' => 'Lian Sin',
				),
				'desc' => array(
					'cn' => 'Lian Sin description.',
				),
				'img_count' => 8,
			),
			array(
				'name' => array(
					'cn' => 'TK',
				),
				'desc' => array(
					'cn' => 'TK description.',
				),
				'img_count' => 5,
			),
			/*
			array(
				'name' => array(
					'cn' => 'IP Server One',
				),
				'desc' => array(
					'cn' => 'IP Server One description.',
				),
				'img_count'   => '3, 4, 5',
			),
			array(
				'name' => array(
					'cn' => 'PLT',
				),
				'desc' => array(
					'cn' => 'PLT description.',
				),
				'img_count'   => '3, 4, 5',
			),
			array(
				'name' => array(
					'cn' => 'Greenology',
				),
				'desc' => array(
					'cn' => 'Greenology description.',
				),,
				'img_count'   => '3, 4, 5',
			),
			array(
				'name' => array(
					'cn' => 'Hair Milk',
				),
				'desc' => array(
					'cn' => 'Hair Milk description.',
				),
				'img_count'   => '3, 4, 5',
			),
			array(
				'name' => array(
					'cn' => 'Hairdepot',
				),
				'desc' => array(
					'cn' => 'Hairdepot description.',
				),
				'img_count'   => '3, 4, 5',
			),
			array(
				'name' => array(
					'cn' => 'Midori',
				),
				'desc' => array(
					'cn' => 'Midori description.',
				),,
				'img_count'   => '3, 4, 5',
			),
			*/
		);

		$proCount = 0;

		foreach ($projects as $project)
		{
			$imgId   = ++$lastFileId;
			$bgImgId = ++$lastFileId;
			$imgIds  = $this->_getImgIds($project['img_count'], $lastFileId);

			$values  = array(
				++$lastInstanceId => array(
					'name' => array(
						'cn' => $project['name']['cn']
					),
					'desc' => array(
						'cn' => $project['desc']['cn']
					),
					'img_id'     => $imgId,
					'bg_img_id'  => $bgImgId,
					'img_ids'  => implode("," , $imgIds),
					'founder'    => 'Jerry Young',
					'year'       => '2014',
					'sort_order' => $proCount,
				),
			);

			$lastFileId = end($imgIds);

			foreach ($values[$lastInstanceId] as $code => $item)
			{
				$attr = Attribute::where('code', '=', $code)->first();

				if (is_array($item))
				{
					foreach ($item as $loc => $value)
					{
						$locale = Locale::where('code', '=', $loc)->first();

						$attrValue = new AttributeValue;
						$attrValue->attribute_id = $attr->id;
						$attrValue->entity_instance_id = $lastInstanceId;
						$attrValue->value = $value;
						$attrValue->locale_id = $locale->id;
						$attrValue->save();
					}
				}
				else
				{
					$attrValue = new AttributeValue;
					$attrValue->attribute_id = $attr->id;
					$attrValue->entity_instance_id = $lastInstanceId;
					$attrValue->value = $item;
					$attrValue->save();
				}
			}

			$count = $lastInstanceId - $baseInstanceId;
			$child = new EntityChild;
			$entityId = Entity::where('code', '=', 'category')->first()->id;

			// Automotive
			if ($count == 1)
			{
				$child->parent_id = '1';
			}
			// Banking
			else if ($count >= 2 && $count <= 3)
			{
				$child->parent_id = '2';
			}
			// Beauty
			else if ($count == 4)
			{
				$child->parent_id = '3';
			}
			// Developer
			else if ($count == 5)
			{
				$child->parent_id = '4';
			}
			// Education
			else if ($count >= 6 && $count <= 7)
			{
				$child->parent_id = '5';
			}
			// F&B
			else if ($count >= 8 && $count <= 10)
			{
				$child->parent_id = '6';
			}
			// IT
			else if ($count >= 11 && $count <= 12)
			{
				$child->parent_id = '7';
			}
			// Retailer
			else if ($count >= 13 && $count <= 16)
			{
				$child->parent_id = '8';
			}

			$child->child_id = $lastInstanceId;
			$child->save();

			$proCount++;
		}
	}

	protected function _getImgIds($count, $lastFileId)
	{
		$imgIds = array();

		for ($i = 0; $i < $count; $i++)
		{
			$imgIds[] = ++$lastFileId;
		}

		return $imgIds;
	}

}