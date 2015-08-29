<?php

use Illuminate\Database\Seeder;
use App\Models\Status;
use App\Models\Locale;
use App\Models\Files;
use App\Models\Project;
use App\Models\ProjectTranslation;
use App\Models\ProjectFile;

class ProjectTableSeeder extends Seeder 
{
	public function run()
	{
		$lastFileId = ($id = Files::where('status', '=', STATUS::ACTIVE)->get()->last()->id) ? $id : 0;

		$files = array(
			array(
				'name' => 'apu_logo',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Automotive/World Top/Thumbnail/apu_logo.jpg',
			),
			array(
				'name' => 'WorldTop_Thumbnail',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Automotive/World Top/Thumbnail/WorldTop_Thumbnail.jpg',
			),
			array(
				'name' => 'WorldTop_Billboard_1920',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Automotive/World Top/Full Width/WorldTop_Billboard_1920.jpg',
			),
			array(
				'name' => 'WorldTop_Billboard_2012_1920',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Automotive/World Top/Full Width/WorldTop_Billboard_2012_1920.jpg',
			),
			array(
				'name' => 'WorldTop_Flyer_1920',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Automotive/World Top/Full Width/WorldTop_Flyer_1920.jpg',
			),
			array(
				'name' => 'RHB_FunFacts_Thumbnail',
				'type' => 'image/png',
				'dir'  => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Thumbnail/RHB_FunFacts_Thumbnail.png',
			),
			array(
				'name' => 'RHB_FunFacts_Thumbnail_Background',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Thumbnail/RHB_FunFacts_Thumbnail_Background.jpg',
			),
			array(
				'name' => 'FunFacts_Cover_1920',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Full Width/FunFacts_Cover_1920.jpg',
			),
			array(
				'name' => 'FunFacts_Music_01_1920',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Full Width/FunFacts_Music_01_1920.jpg',
			),
			array(
				'name' => 'FunFacts_Music_19',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Full Width/FunFacts_Music_1920.jpg',
			),
			array(
				'name' => 'FunFacts_Onion_01_1920',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Full Width/FunFacts_Onion_01_1920.jpg',
			),
			array(
				'name' => 'FunFacts_Onion_02_1920',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Full Width/FunFacts_Onion_02_1920.jpg',
			),
			array(
				'name' => 'FunFacts_Onion_03_1920',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Full Width/FunFacts_Onion_03_1920.jpg',
			),
			array(
				'name' => 'FunFacts_Onion_04_1920',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Full Width/FunFacts_Onion_04_1920.jpg',
			),
			array(
				'name' => 'FunFacts_Recycling_01_1920',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Full Width/FunFacts_Recycling_01_1920.jpg',
			),
			array(
				'name' => 'FunFacts_Recycling_1920',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Full Width/FunFacts_Recycling_1920.jpg',
			),
			array(
				'name' => 'FunFacts_Spider_01_1920',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Full Width/FunFacts_Spider_01_1920.jpg',
			),
			array(
				'name' => 'FunFacts_Spider_1920',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Full Width/FunFacts_Spider_1920.jpg',
			),
			array(
				'name' => 'FunFacts_VaticanCity_02_1920',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Full Width/FunFacts_VaticanCity_02_1920.jpg',
			),
			array(
				'name' => 'FunFacts_VaticanCity_03_1920',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Full Width/FunFacts_VaticanCity_03_1920.jpg',
			),
			array(
				'name' => 'FunFacts_VaticanCity_04_1920',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Banking/RHB/Fun Facts/Full Width/FunFacts_VaticanCity_04_1920.jpg',
			),
			array(
				'name' => 'RHB_WOTD_Thumbnail',
				'type' => 'image/png',
				'dir'  => '/img/Credential Portfolio/Banking/RHB/WOTD/Thumbnail/RHB_WOTD_Thumbnail.png',
			),
			array(
				'name' => 'RHB_WOTD_Thumbnail_Background',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Banking/RHB/WOTD/Thumbnail/RHB_WOTD_Thumbnail_Background.jpg',
			),
			array(
				'name'       => 'WOTD_Cover_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_Cover_1920.jpg',
			),
			array(
				'name'       => 'WOTD_Accept&Except_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_Accept&Except_01_1920.jpg',
			),
			array(
				'name'       => 'WOTD_Accept&Except_02_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_Accept&Except_02_1920.jpg',
			),
			array(
				'name'       => 'WOTD_Accept&Except_03_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_Accept&Except_03_1920.jpg',
			),
			array(
				'name'       => 'WOTD_Accept&Except_04_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_Accept&Except_04_1920.jpg',
			),
			array(
				'name'       => 'WOTD_College&Collage_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_College&Collage_01_1920.jpg',
			),
			array(
				'name'       => 'WOTD_College&Collage_02_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_College&Collage_02_1920.jpg',
			),
			array(
				'name'       => 'WOTD_College&Collage_03_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_College&Collage_03_1920.jpg',
			),
			array(
				'name'       => 'WOTD_Complement&Compliment_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_Complement&Compliment_01_1920.jpg',
			),
			array(
				'name'       => 'WOTD_Complement&Compliment_02_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_Complement&Compliment_02_1920.jpg',
			),
			array(
				'name'       => 'WOTD_Complement&Compliment_03_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_Complement&Compliment_03_1920.jpg',
			),
			array(
				'name'       => 'WOTD_Complement&Compliment_04_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_Complement&Compliment_04_1920.jpg',
			),
			array(
				'name'       => 'WOTD_Message&Massage_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_Message&Massage_1920.jpg',
			),
			array(
				'name'       => 'WOTD_Message&Massage_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_Message&Massage_01_1920.jpg',
			),
			array(
				'name'       => 'WOTD_Whether&Weather_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_Whether&Weather_1920.jpg',
			),
			array(
				'name'       => 'WOTD_Whether&Weather_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_Whether&Weather_01_1920.jpg',
			),
			array(
				'name'   => 'Sunshine_Website_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Portfolio/Beauty/Sunshine/Thumbnail/Sunshine_Website_Thumbnail.png',
			),
			array(
				'name'   => 'Sunshine_Website_Thumbnail',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Beauty/Sunshine/Thumbnail/Sunshine_Website_Thumbnail.jpg',
			),
			array(
				'name'       => 'Sunshine_Website_01',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Beauty/Sunshine/Full Width/Sunshine_Website_01.jpg',
			),
			array(
				'name'       => 'Sunshine_Website_02',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Beauty/Sunshine/Full Width/Sunshine_Website_02.jpg',
			),
			array(
				'name'       => 'Sunshine_Website_03',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Beauty/Sunshine/Full Width/Sunshine_Website_03.jpg',
			),
			array(
				'name'       => 'Sunshine_Website_04',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Beauty/Sunshine/Full Width/Sunshine_Website_04.jpg',
			),
			array(
				'name'   => 'Fortson_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Portfolio/Developer/Fortson/Thumbnail/Fortson_Thumbnail.png',
			),
			array(
				'name'   => 'Fortson_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Developer/Fortson/Thumbnail/Fortson_Thumbnail_Background.jpg',
			),
			array(
				'name'       => 'Fortson_Cover_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Developer/Fortson/Full Width/Fortson_Cover_1920.jpg',
			),
			array(
				'name'       => 'Fortson_Branding_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Developer/Fortson/Full Width/Fortson_Branding_1920.jpg',
			),
			array(
				'name'       => 'Fortson_Branding_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Developer/Fortson/Full Width/Fortson_Branding_01_1920.jpg',
			),
			array(
				'name'       => 'Fortson_Website_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Developer/Fortson/Full Width/Fortson_Website_01_1920.jpg',
			),
			array(
				'name'       => 'Fortson_Website_03_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Developer/Fortson/Full Width/Fortson_Website_03_1920.jpg',
			),
			array(
				'name'   => 'Globbykidz_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Portfolio/Education/Globbykidz/Thumbnail/Globbykidz_Thumbnail.png',
			),
			array(
				'name'   => 'Globbykidz_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Education/Globbykidz/Thumbnail/Globbykidz_Thumbnail_Background.jpg',
			),
			array(
				'name'       => 'GlobbyKids_Cover_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Education/Globbykidz/Full Width/GlobbyKids_Cover_1920.jpg',
			),
			array(
				'name'       => 'GlobbyKidz_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Education/Globbykidz/Full Width/GlobbyKidz_01_1920.jpg',
			),
			array(
				'name'       => 'GlobbyKidz_02_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Education/Globbykidz/Full Width/GlobbyKidz_02_1920.jpg',
			),
			array(
				'name'       => 'Globbykidz_BrandManual_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Education/Globbykidz/Full Width/Globbykidz_BrandManual_01_1920.jpg',
			),
			array(
				'name'       => 'Globbykidz_BrandManual_02_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Education/Globbykidz/Full Width/Globbykidz_BrandManual_02_1920.jpg',
			),
			array(
				'name'       => 'Globbykidz_BrandManual_03_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Education/Globbykidz/Full Width/Globbykidz_BrandManual_03_1920.jpg',
			),
			array(
				'name'       => 'Globbykidz_Report_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Education/Globbykidz/Full Width/Globbykidz_Report_01_1920.jpg',
			),
			array(
				'name'       => 'Globbykidz_Report_02_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Education/Globbykidz/Full Width/Globbykidz_Report_02_1920.jpg',
			),
			array(
				'name'       => 'Globbykidz_Report_03_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Education/Globbykidz/Full Width/Globbykidz_Report_03_1920.jpg',
			),
			array(
				'name'       => 'GlobbyKidz_Banner_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Education/Globbykidz/Full Width/GlobbyKidz_Banner_1920.jpg',
			),
			array(
				'name'       => 'GlobbyKidz_Flyer_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Education/Globbykidz/Full Width/GlobbyKidz_Flyer_1920.jpg',
			),
			array(
				'name'   => 'Kostka_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Portfolio/Education/Kostka/Thumbnail/Kostka_Thumbnail.png',
			),
			array(
				'name'   => 'Kostka_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Education/Kostka/Thumbnail/Kostka_Thumbnail_Background.jpg',
			),
			array(
				'name'       => 'Kostka_Branding_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Education/Kostka/Full Width/Kostka_Branding_01_1920.jpg',
			),
			array(
				'name'       => 'Kostka_Branding_05_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/Education/Kostka/Full Width/Kostka_Branding_05_1920.jpg',
			),
			array(
				'name'   => 'Auric_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Portfolio/F&B/Auric Pacific/Thumbnail/Auric_Thumbnail.png',
			),
			array(
				'name'   => 'Auric_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/F&B/Auric Pacific/Thumbnail/Auric_Thumbnail_Background.jpg',
			),
			array(
				'name'       => 'Auric_Cover_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Auric Pacific/Full Width/Auric_Cover_1920.jpg',
			),
			array(
				'name'       => 'Auric_Poster_2014_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Auric Pacific/Full Width/Auric_Poster_2014_1920.jpg',
			),
			array(
				'name'       => 'Auric_Booth_2015_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Auric Pacific/Full Width/Auric_Booth_2015_1920.jpg',
			),
			array(
				'name'       => 'Auric_Brochure_2013_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Auric Pacific/Full Width/Auric_Brochure_2013_1920.jpg',
			),
			array(
				'name'       => 'Auric_Brochure_2013_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Auric Pacific/Full Width/Auric_Brochure_2013_01_1920.jpg',
			),
			array(
				'name'       => 'Auric_Brochure_2014_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Auric Pacific/Full Width/Auric_Brochure_2014_1920.jpg',
			),
			array(
				'name'       => 'Auric_Brochure_2014_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Auric Pacific/Full Width/Auric_Brochure_2014_01_1920.jpg',
			),
			array(
				'name'       => 'Auric_Brochure_2015_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Auric Pacific/Full Width/Auric_Brochure_2015_1920.jpg',
			),
			array(
				'name'       => 'Auric_Brochure_2015_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Auric Pacific/Full Width/Auric_Brochure_2015_01_1920.jpg',
			),
			array(
				'name'       => 'Auric_Bunting_2013_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Auric Pacific/Full Width/Auric_Bunting_2013_1920.jpg',
			),
			array(
				'name'       => 'Auric_Bunting_2013_1920_01',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Auric Pacific/Full Width/Auric_Bunting_2013_1920_01.jpg',
			),
			array(
				'name'       => 'Auric_Bunting_2014_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Auric Pacific/Full Width/Auric_Bunting_2014_1920.jpg',
			),
			array(
				'name'       => 'Auric_Bunting_2014_01_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Auric Pacific/Full Width/Auric_Bunting_2014_01_1920.jpg',
			),
			array(
				'name'       => 'Auric_Bunting_2015_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Auric Pacific/Full Width/Auric_Bunting_2015_1920.jpg',
			),
			array(
				'name'   => 'LianSin_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Portfolio/F&B/Lian Sin/Thumbnail/LianSin_Thumbnail.png',
			),
			array(
				'name'   => 'LianSin_Thumbnail',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/F&B/Lian Sin/Thumbnail/LianSin_Thumbnail.jpg',
			),
			array(
				'name'       => 'LianSin_Cover_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Lian Sin/Full Width/LianSin_Cover_1920.jpg',
			),
			array(
				'name'       => 'Butterfly_Packaging_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Lian Sin/Full Width/Butterfly_Packaging_1920.jpg',
			),
			array(
				'name'       => 'Butterfly_RedPacket_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Lian Sin/Full Width/Butterfly_RedPacket_1920.jpg',
			),
			array(
				'name'       => 'CapAmoi_Poster_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Lian Sin/Full Width/CapAmoi_Poster_1920.jpg',
			),
			array(
				'name'       => 'CapAmoi_PressAd_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Lian Sin/Full Width/CapAmoi_PressAd_1920.jpg',
			),
			array(
				'name'       => 'Chrysanthemum_Packaging_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Lian Sin/Full Width/Chrysanthemum_Packaging_1920.jpg',
			),
			array(
				'name'       => 'LianSin_Raya_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Lian Sin/Full Width/LianSin_Raya_1920.jpg',
			),
			array(
				'name'       => 'MrThai_Packaging_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/Lian Sin/Full Width/MrThai_Packaging_1920.jpg',
			),
			array(
				'name'   => 'TK_Website_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Portfolio/F&B/TK/Thumbnail/TK_Website_Thumbnail.png',
			),
			array(
				'name'   => 'TK_Website_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/F&B/TK/Thumbnail/TK_Website_Thumbnail_Background.jpg',
			),
			array(
				'name'       => 'TK_Website_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/TK/Full Width/TK_Website_1920.jpg',
			),
			array(
				'name'       => 'TK_Website_02_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/TK/Full Width/TK_Website_02_1920.jpg',
			),
			array(
				'name'       => 'TK_Website_03_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/TK/Full Width/TK_Website_03_1920.jpg',
			),
			array(
				'name'       => 'TK_Website_04_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/TK/Full Width/TK_Website_04_1920.jpg',
			),
			array(
				'name'       => 'TK_Website_05_1920',
				'type'       => 'image/jpeg',
				'dir'        => '/img/Credential Portfolio/F&B/TK/Full Width/TK_Website_05_1920.jpg',
			),
			array(
				'name'   => 'IP_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Portfolio/IT/IP Server One/Thumbnail/IP_Thumbnail.png',
			),
			array(
				'name'   => 'IP_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/IT/IP Server One/Thumbnail/IP_Thumbnail_Background.jpg',
			),
			array(
				'name'   => 'PLT_Website_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Portfolio/IT/PLT/Thumbnail/PLT_Website_Thumbnail.png',
			),
			array(
				'name'   => 'PLT_Website_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/IT/PLT/Thumbnail/PLT_Website_Thumbnail_Background.jpg',
			),
			array(
				'name'   => 'Greenology_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Portfolio/Retailer/Greenology/Thumbnail/Greenology_Thumbnail.png',
			),
			array(
				'name'   => 'Greenology_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Greenology/Thumbnail/Greenology_Thumbnail_Background.jpg',
			),
			array(
				'name'   => 'HairMilk_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Portfolio/Retailer/Hair Milk/Thumbnail/HairMilk_Thumbnail.png',
			),
			array(
				'name'   => 'HairMilk_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Hair Milk/Thumbnail/HairMilk_Thumbnail_Background.jpg',
			),
			array(
				'name'   => 'Hairdepot_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Portfolio/Retailer/Hairdepot/Thumbnail/Hairdepot_Thumbnail.png',
			),
			array(
				'name'   => 'Hairdepot_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Hairdepot/Thumbnail/Hairdepot_Thumbnail_Background.jpg',
			),
			array(
				'name' => 'Midori_Thumbnail',
				'type' => 'image/png',
				'dir'  => '/img/Credential Portfolio/Retailer/Midori/Thumbnail/Midori_Thumbnail.png',
			),
			array(
				'name' => 'Midori_Thumbnail',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Retailer/Midori/Thumbnail/Midori_Thumbnail.jpg',
			),
		);

		foreach ($files as $file)
		{
			Files::create($file);
		}

		$projects = array(
			array(
				'translation' => array(
					'cn' => array(
						'name' => 'World Top',
						'desc' => 'World Top description.'
					),
				),
				'img_count'   => 3,
				'category_id' => 1,
			),
			array(
				'translation' => array(
					'cn' => array(
						'name' => 'Fun Facts (RHB)',
						'desc' => 'Fun Facts (RHB) description.'
					),
				),
				'img_count'   => 14,
				'category_id' => 2,
			),
			array(
				'translation' => array(
					'cn' => array(
						'name' => 'WOTD (RHB)',
						'desc' => 'WOTD (RHB) description.'
					),
				),
				'img_count'   => 16,
				'category_id' => 2,
			),
			array(
				'translation' => array(
					'cn' => array(
						'name' => 'Sunshine',
						'desc' => 'Sunshine description.'
					),
				),
				'img_count'   => 4,
				'category_id' => 3,
			),
			array(
				'translation' => array(
					'cn' => array(
						'name' => 'Fortson',
						'desc' => 'Fortson description.'
					),
				),
				'img_count'   => 5,
				'category_id' => 4,
			),
			array(
				'translation' => array(
					'cn' => array(
						'name' => 'Globbykidz',
						'desc' => 'Globbykidz description.'
					),
				),
				'img_count'   => 11,
				'category_id' => 5,
			),
			array(
				'translation' => array(
					'cn' => array(
						'name' => 'Kostka',
						'desc' => 'Kostka description.'
					),
				),
				'img_count'   => 2,
				'category_id' => 5,
			),
			array(
				'translation' => array(
					'cn' => array(
						'name' => 'Auric Pacific',
						'desc' => 'Auric Pacific description.'
					),
				),
				'img_count'   => 14,
				'category_id' => 6,
			),
			array(
				'translation' => array(
					'cn' => array(
						'name' => 'Lian Sin',
						'desc' => 'Lian Sin description.'
					),
				),
				'img_count'   => 8,
				'category_id' => 6,
			),
			array(
				'translation' => array(
					'cn' => array(
						'name' => 'TK',
						'desc' => 'TK description.'
					),
				),
				'img_count'   => 5,
				'category_id' => 6,
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

		$count = 0;

		foreach ($projects as $project)
		{
			$proj = New Project;
			$proj->category_id    = $project['category_id'];
			$proj->grid_img_id    = ++$lastFileId;
			$proj->grid_bg_img_id = ++$lastFileId;
			$proj->brand_img_id   = '16';
			$proj->pri_color_code = '#6666FF';
			$proj->sec_color_code = '#6699FF';
			$proj->txt_color_code = '#8C0039';
			$proj->year           = '2014';
			$proj->sort_order     = $count++;
			$proj->save();

			foreach ($project['translation'] as $key => $val)
			{
				$locale = Locale::where('language', '=', $key)->first();

				$projTranslation = new ProjectTranslation;
				$projTranslation->project_id  = $proj->id;
				$projTranslation->locale_id   = $locale->id;
				$projTranslation->name        = $val['name'];
				$projTranslation->desc        = $val['desc'];
				$projTranslation->founder     = 'Jerry Young';
				$projTranslation->client_name = $val['name'];
				$projTranslation->save();
			}

			$lastFileId = $this->_saveProjectImages($project['img_count'], $lastFileId, $proj->id);
		}

	}

	protected function _saveProjectImages($count, $lastFileId, $projectId)
	{
		$cnt = 0;

		for ($i = 0; $i < $count; $i++)
		{
			$projFile = New ProjectFile;
			$projFile->project_id = $projectId;
			$projFile->img_id     = ++$lastFileId;
			$projFile->sort_order = $cnt++;
			$projFile->save();
		}

		return $lastFileId;
	}

}