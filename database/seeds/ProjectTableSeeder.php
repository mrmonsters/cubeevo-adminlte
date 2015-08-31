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
				'name' => 'WorldTop_Thumbnail',
				'type' => 'image/png',
				'dir'  => '/img/Credential Portfolio/Automotive/World Top/Thumbnail/WorldTop_Thumbnail.png',
			),
			array(
				'name' => 'WorldTop_Thumbnail_Background',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Automotive/World Top/Thumbnail/WorldTop_Thumbnail_Background.jpg',
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
				'name' => 'WOTD_Cover_1920',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_Cover_1920.jpg',
			),
			array(
				'name' => 'WOTD_Accept&Except_01_1920',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_Accept&Except_01_1920.jpg',
			),
			array(
				'name' => 'WOTD_Accept&Except_02_1920',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Banking/RHB/WOTD/Full Width/WOTD_Accept&Except_02_1920.jpg',
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
				'name'   => 'IP_Cover_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/IT/IP Server One/Full Width/IP_Cover_1920.jpg',
			),
			array(
				'name'   => 'IP_Man_01_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/IT/IP Server One/Full Width/IP_Man_01_1920.jpg',
			),
			array(
				'name'   => 'IP_Man_02_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/IT/IP Server One/Full Width/IP_Man_02_1920.jpg',
			),
			array(
				'name'   => 'IP_Villain_01_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/IT/IP Server One/Full Width/IP_Villain_01_1920.jpg',
			),
			array(
				'name'   => 'IP_Villain_02_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/IT/IP Server One/Full Width/IP_Villain_02_1920.jpg',
			),
			array(
				'name'   => 'IP_StoryBoard_01_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/IT/IP Server One/Full Width/IP_StoryBoard_01_1920.jpg',
			),
			array(
				'name'   => 'IP_Character_01_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/IT/IP Server One/Full Width/IP_Character_01_1920.jpg',
			),
			array(
				'name'   => 'IP_Character_02_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/IT/IP Server One/Full Width/IP_Character_02_1920.jpg',
			),
			array(
				'name'   => 'IP_Character_03_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/IT/IP Server One/Full Width/IP_Character_03_1920.jpg',
			),
			array(
				'name'   => 'IP_Story_01_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/IT/IP Server One/Full Width/IP_Story_01_1920.jpg',
			),
			array(
				'name'   => 'IP_Story_02_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/IT/IP Server One/Full Width/IP_Story_02_1920.jpg',
			),
			array(
				'name'   => 'IP_Story_05_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/IT/IP Server One/Full Width/IP_Story_05_1920.jpg',
			),
			array(
				'name'   => 'IP_Story_03_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/IT/IP Server One/Full Width/IP_Story_03_1920.jpg',
			),
			array(
				'name'   => 'IP_Story_04_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/IT/IP Server One/Full Width/IP_Story_04_1920.jpg',
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
				'name'   => 'PLT_Website_Cover',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/IT/PLT/Full Width/PLT_Website_Cover.jpg',
			),
			array(
				'name'   => 'DSC_3142_Red',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/IT/PLT/Full Width/DSC_3142_Red.jpg',
			),
			array(
				'name'   => 'PLT_Brochure_01',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/IT/PLT/Full Width/PLT_Brochure_01.jpg',
			),
			array(
				'name'   => 'PLT_Website_01',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/IT/PLT/Full Width/PLT_Website_01.jpg',
			),
			array(
				'name'   => 'PLT_Website_04',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/IT/PLT/Full Width/PLT_Website_04.jpg',
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
				'name'   => 'Greenology_Branding_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Greenology/Full Width/Greenology_Branding_1920.jpg',
			),
			array(
				'name'   => 'Greenology_Magazine_1920x1068',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Greenology/Full Width/Greenology_Magazine_1920x1068.jpg',
			),
			array(
				'name'   => 'Greenology_Magazine_02_1920x1068',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Greenology/Full Width/Greenology_Magazine_02_1920x1068.jpg',
			),
			array(
				'name'   => 'Greenology_Brochure_1920x1068',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Greenology/Full Width/Greenology_Brochure_1920x1068.jpg',
			),
			array(
				'name'   => 'Greenology_Packaging_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Greenology/Full Width/Greenology_Packaging_1920.jpg',
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
				'name'   => 'HairMilk_Cover_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Hair Milk/Full Width/HairMilk_Cover_1920.jpg',
			),
			array(
				'name'   => 'HairMilk_Poster_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Hair Milk/Full Width/HairMilk_Poster_1920.jpg',
			),
			array(
				'name'   => 'HairMilk_Brochure_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Hair Milk/Full Width/HairMilk_Brochure_1920.jpg',
			),
			array(
				'name'   => 'HairMilk_Packaging_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Hair Milk/Full Width/HairMilk_Packaging_1920.jpg',
			),
			array(
				'name'   => 'HairMilk_SachetCard_02_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Hair Milk/Full Width/HairMilk_SachetCard_02_1920.jpg',
			),
			array(
				'name'   => 'HairMilk_Sachet_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Hair Milk/Full Width/HairMilk_Sachet_1920.jpg',
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
				'name'   => 'Hairdepot_Branding_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Hairdepot/Full Width/Hairdepot_Branding_1920.jpg',
			),
			array(
				'name'   => 'Images-24',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Hairdepot/Full Width/Images-24.jpg',
			),
			array(
				'name'   => 'Images-25',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Hairdepot/Full Width/Images-25.jpg',
			),
			array(
				'name'   => 'Images-26',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Hairdepot/Full Width/Images-26.jpg',
			),
			array(
				'name'   => 'Images-27',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Hairdepot/Full Width/Images-27.jpg',
			),
			array(
				'name'   => 'Hairdepot_Branding_CIS_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Hairdepot/Full Width/Hairdepot_Branding_CIS_1920.jpg',
			),
			array(
				'name'   => 'Hairdepot_Branding_Mascot_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Hairdepot/Full Width/Hairdepot_Branding_Mascot_1920.jpg',
			),
			array(
				'name'   => 'Hairdepot_Branding_Poster_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Hairdepot/Full Width/Hairdepot_Branding_Poster_1920.jpg',
			),
			array(
				'name'   => 'Hairdepot_Branding_Tee_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Hairdepot/Full Width/Hairdepot_Branding_Tee_1920.jpg',
			),
			array(
				'name'   => 'Hairdepot_Branding_NonWovenBag_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Hairdepot/Full Width/Hairdepot_Branding_NonWovenBag_1920.jpg',
			),
			array(
				'name'   => 'Hairdepot_Branding_Wobbler_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Hairdepot/Full Width/Hairdepot_Branding_Wobbler_1920.jpg',
			),
			array(
				'name'   => 'Hairdepot_Branding_Presentation_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Hairdepot/Full Width/Hairdepot_Branding_Presentation_1920.jpg',
			),
			array(
				'name'   => 'Hairdepot_Branding_Certificate_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Hairdepot/Full Width/Hairdepot_Branding_Certificate_1920.jpg',
			),
			array(
				'name'   => 'Hairdepot_BrandManual_01_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Hairdepot/Full Width/Hairdepot_BrandManual_01_1920.jpg',
			),
			array(
				'name'   => 'Hairdepot_Branding_MobileApp_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Hairdepot/Full Width/Hairdepot_Branding_MobileApp_1920.jpg',
			),
			array(
				'name'   => 'Hairdepot_Branding_Hoarding_1920',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Portfolio/Retailer/Hairdepot/Full Width/Hairdepot_Branding_Hoarding_1920.jpg',
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
			array(
				'name' => 'Midori_Cover_1920',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Retailer/Midori/Full Width/Midori_Cover_1920.jpg',
			),
			array(
				'name' => 'Midori_Magazine_01_1920x1068',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Retailer/Midori/Full Width/Midori_Magazine_01_1920x1068.jpg',
			),
			array(
				'name' => 'Midori_Magazine_02_1920x1068',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Retailer/Midori/Full Width/Midori_Magazine_02_1920x1068.jpg',
			),
			array(
				'name' => 'Midori_PaperBag_1920',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Retailer/Midori/Full Width/Midori_PaperBag_1920.jpg',
			),
			array(
				'name' => 'Midori_SachetCard_02_1920',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Retailer/Midori/Full Width/Midori_SachetCard_02_1920.jpg',
			),
			array(
				'name' => 'Midori_Sachet_1920',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Retailer/Midori/Full Width/Midori_Sachet_1920.jpg',
			),
			array(
				'name' => 'BenCaoJi_Thumbnail',
				'type' => 'image/png',
				'dir'  => '/img/Credential Portfolio/Retailer/Ben Cao Ji/Thumbnail/BenCaoJi_Thumbnail.png',
			),
			array(
				'name' => 'BenCaoJi_Thumbnail_Background',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Retailer/Ben Cao Ji/Thumbnail/BenCaoJi_Thumbnail_Background.jpg',
			),
			array(
				'name' => 'BenCaoJi_Cover_1920',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Retailer/Ben Cao Ji/Full Width/BenCaoJi_Cover_1920.jpg',
			),
			array(
				'name' => 'BenCaoJi_Packaging_01_1920',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Retailer/Ben Cao Ji/Full Width/BenCaoJi_Packaging_01_1920.jpg',
			),
			array(
				'name' => 'BenCaoJi_Packaging_02_1920',
				'type' => 'image/jpeg',
				'dir'  => '/img/Credential Portfolio/Retailer/Ben Cao Ji/Full Width/BenCaoJi_Packaging_02_1920.jpg',
			),
		);

		foreach ($files as $file)
		{
			Files::create($file);
		}

		/*
		'translation' => array(
			'cn' => array(
				'name'       => '',
				'background' => '',
				'challenge'  => '',
				'result'     => '',
			),
			'en' => array(
				'name'       => '',
				'background' => '',
				'challenge'  => '',
				'result'     => '',
			),
		),
		'client_name' => 'RHB BANK',
		'year'		  => '',
		'img_count'   => 13,
		'category_id' => 2,
		*/
		$projects = array(
			array(
				'translation' => array(
					'cn' => array(
						'name'        => '企业形象设计',
						'background'  => 'World Top Machinery & Equipment于2011年10月中旬正式成立。企业早期负责马来西亚市场非公路矿用车的贸易以及销售服务；后来成为中国同力重工在马来西亚的独家经销商，而同力重工为中国非公路矿用自卸车行业的市场领导者。企业本着精益求精、追求卓越品质和服务的理念，满足马来西亚市场以及客户对非公路矿用车的需求，提供更高性能以及更实惠的解决方案。因此，所经销代理的非公路矿用车型号更多、选择更广，适合各种不同领域的运输需求。其所经销的车型出勤率更佳，能有效地减低所需的运输时间，进而提供更好的投资效益。秉承中国同力重工“做中国最经济适用非公路矿用车”的产品理念，World Top放眼未来，一心期待成为马来西亚非公路矿用车行业的领导者。',
						'challenge'   => '作为小众市场的产品，客户希望我们能为他们设计能提升业绩表现的广告道具。他们代理的产品是非公路宽体自卸车，形立方帮客户定位为久经沙场、力承千钧的载体，同时也符合经济效益。',
						'result'      => '在第一次合作当中，我们发想极具商业价值的广告语，也采用大象照片，象征矿石般的沉重，提升视觉震撼感以及记忆点。客户反映说我们的作品破格大胆，视觉效果比他们之前的宣传形象更为壮观。我们的作品成功提升询问度，大大提高销售业绩，也因此才造就我们第二次合作。',
						'client_name' => 'World Top',
					),
					'en' => array(
						'name'        => 'CORPORATE IMAGE DEVELOPMENT',
						'background'  => 'Founded in October 2011, World Top Machinery & Equipment supplied Malaysian with Off-road Mining Vehicles and later became China’s Tonly leading distributor in Malaysia mainly consisting of Heavy Duty Off-road Mining Equipments. With a wide selection of Mining Equipments for different purposes, World Top’s line of productions have helped their customers save time and cost in transportation effectively. Setting them on a mission in becoming Malaysia’s leading distributor in the mining industries.',
						'challenge'   => 'When it came down to being clear and straight forward, we created visuals that are set at mining sites with mining trucks carrying extremely heavy loads. Also signifying efficiency and effectiveness to gain customers’ trust.',
						'result'      => 'During our first collaboration, we went for commercial standards by using materials like an elephant atop a mining truck to symbolise the truck’s stability, effectiveness and its ability to be able to withstand heavy loads. The client was so satisfied with our work that they said our methods were bold and the visuals have made a huge impact towards their customers. They are also happy to report that their sales have gone up since. Hence, we were assigned our second project. ',
						'client_name' => 'World Top',
					),
				),
				'year'        => '2014',
				'img_count'   => 2,
				'category_id' => 1,
			),
			array(
				'translation' => array(
					'cn' => array(
						'name'        => '孩童教育30秒[趣味常识]影片',
						'background'  => '客户每年都会在电视台TViQ频道播放教育短片，今次则在介绍之下有幸合作。',
						'challenge'   => '客户需要我们在30天内制作5部短片，从客户所提供的基本框架，撰写文案、设计人物与环境、录制配音与音效，以及完成完整的动画制作。',
						'result'      => '我们设计作品里的人物构图与字体美工十分活泼生动，剧本内容简单明了，能让孩童容易吸收，整体效果也让观众看得很喜欢。客户非常喜欢我们灵活的配合度，也非常满意我们的作品效果。预测很快会有下次合作。',
						'client_name' => 'RHB BANK',
					),
					'en' => array(
						'name'        => '“Fun Facts” 30 Second Kids Education VIDEO',
						'background'  => 'TViQ is an Astro channel that is also a platform for RHB to air their educational short clip commercials. And we were most honoured to be working with RHB under recommendation. ',
						'challenge'   => 'This project was a challenge for us. We were given a 30-day window to deliver 5 motion graphics commercials and that included conceptualising, storyboarding, script writing, visualising, narrating, down right to animating. ',
						'result'      => 'The commercials were very lively and animated, straight forward and clear, which made it very easy for kids to understand and well accepted. This proved to be a fruitful and rewarding partnership with RHB and we are looking forward to working with them pretty soon.',
						'client_name' => 'RHB BANK',
					),
				),
				'year'        => '2014',
				'img_count'   => 13,
				'category_id' => 2,
			),
			array(
				'translation' => array(
					'cn' => array(
						'name'        => '孩童教育30秒[趣味常识]影片',
						'background'  => '客户每年都会在电视台TViQ频道播放教育短片，今次则在介绍之下有幸合作。',
						'challenge'   => '客户需要我们在30天内制作5部短片，从客户所提供的基本框架，撰写文案、设计人物与环境、录制配音与音效，以及完成完整的动画制作。',
						'result'      => '我们设计作品里的人物构图与字体美工十分活泼生动，剧本内容简单明了，能让孩童容易吸收，整体效果也让观众看得很喜欢。客户非常喜欢我们灵活的配合度，也非常满意我们的作品效果。预测很快会有下次合作。',
						'client_name' => 'RHB BANK',
					),
					'en' => array(
						'name'        => '“word of the day” 30 Second Kids Education VIDEO',
						'background'  => 'TViQ is an Astro channel that is also a platform for RHB to air their educational short clip commercials. And we were most honoured to be working with RHB under recommendation.  ',
						'challenge'   => 'This project was a challenge for us.We were given a 30-day window to deliver 5 motion graphics commercials and that included conceptualizing, storyboarding, script writing, visualizing, narrating, down right to animating. ',
						'result'      => 'The commercials were very lively and animated, straight forward and clear, which made it very easy for kids to understand and well accepted. This proved to be a fruitful and rewarding partnership with RHB and we are looking forward to working with them pretty soon.',
						'client_name' => 'RHB BANK',
					),
				),
				'year'        => '2014',
				'img_count'   => 15,
				'category_id' => 2,
			),
			array(
				'translation' => array(
					'cn' => array(
						'name'        => '企业形象设计',
						'background'  => '客户成立自2011年，现已发展成为马来西亚美容产品行业里佼佼者之一。',
						'challenge'   => '客户想要制作一个网站，能让顾客上网翻阅产品资料，或作为公司简介，同时也可以间接提升公司的品牌公信度。',
						'result'      => '我们的网站设计概念是高端稳重，排版用色特别素雅；打造独特风格造型。客户对我们的专业服务特别满意，也表示非常乐意和我们继续合作。',
						'client_name' => 'SUNSHINE TOUCH',
					),
					'en' => array(
						'name'        => 'corporate Image Development',
						'background'  => 'Founded in 2011, Sunshine Touch has now made a name of becoming one of the growing beauty brands in Malaysia.',
						'challenge'   => 'The client wanted their audiences to have a better understanding about Sunshine Touch and their products so that they could gain the trust of their audiences. Hence, they approached us to create a website for them.',
						'result'      => 'And so we did not fail to deliver. We created a high-end, elegant, and most of all unique website that earned us our recognition, professionalism and the key to unlocking the door to our partnership with Sunshine Touch.',
						'client_name' => 'SUNSHINE TOUCH',
					),
				),
				'year'        => '2014',
				'img_count'   => 3,
				'category_id' => 3,
			),
			array(
				'translation' => array(
					'cn' => array(
						'name'        => '主要形象推广设计',
						'background'  => 'Fortson Sdn Bhd 是一家位于巴生河流域的房地产发展商公司，所属集团也涵括别的领域，包括时尚类零售业以及建筑工程。',
						'challenge'   => '客户给我们的任务是规划他们物业三期的上市方案，这物业之特别在于其建造设计充满现代美感之外，还结合阁楼与办公室为设计概念，于是我们给项目命名为[Corporate Industrial Suite @ Kuala Lumpur North]，并应用[Multipurpose Industrial Property]、[Corporate Productivity in Mind]和[Penthouse Lifestyle Incorporated]三大元素，打造 [3合1物业]特色作为推广主题。客户还希望我们能创造一本能让人过目不忘，却也要维持企业风范的销售画册。紧接便是让我们设计网页以及品牌标志系统。',
						'result'      => '客户非常满意我们与众不同的画册设计和网站设计，对我们的创意留下深刻印象，作品更是完全满足他们的需求。客户反馈时也说我们的作品果真体现其项目的独特卖点，还大大提升销售成交速度，短时间内便已售罄。',
						'client_name' => 'FORTSON',
					),
					'en' => array(
						'name'        => 'Key Image Development',
						'background'  => 'Fortson Sdn Bhd is a property development headquartered in the Klang Valley and is part of a group involved in several areas of business including Property Development, Fashion Retail and Engineering and Construction.',
						'challenge'   => 'We were tasked to plan and create a Property Catalogue for the client’s 3rd Phase Development Project. What’s unique about the property is that it’s not just looks and aesthetics but in conjunction with office suite designs. Thus, we named this project “Corporate Industrial Suite @ Kuala Lumpur North”, incorporating elements like “Multipurpose Industrial Property”, “Corporate Productivity in Mind” and “Penthouse Lifestyle Incorporated” to produce a “3-in-1 Property” themed marketing strategy. The client also hoped that we could create a catalogue that could impress and impact the audiences while maintaining its corporate features. We were then tasked to create Fortson’s Website and Visual Identity. ',
						'result'      => 'Not only did our design stood out from the rest, it also impressed the client and furthermore our creativity in creating Fortson’s Property Catalogue has increased their sales in a short amount of time.',
						'client_name' => 'FORTSON',
					),
				),
				'year'        => '2012',
				'img_count'   => 4,
				'category_id' => 4,
			),
			array(
				'translation' => array(
					'cn' => array(
						'name'        => '主要形象推广设计',
						'background'  => '客户的经营模式是一站式学习班，把不同名牌学艺班集合在同一场所里，给家长们方便，无须将孩子送往不同地点学习。更让家长们喜欢的是，客户会在孩子们入学前进行专业的学习性向，包括问答和皮纹检测，再提供适当的兴趣训练。在与客户一番沟通之后，我们把客户定位成让孩子们勇敢追求梦想的平台，教育孩子追梦，怀抱热忱，勇于探索，而不仅仅是在家或在学校里学习课本知识。这也是一般家长乐见的成果。',
						'challenge'   => '首先我们设计出小熊头像的热气球作为客户标志，之后再设计六个小卡通，分别担当不同个性、不同专业，包括芭蕾舞女孩、小画家、小面包师傅、小探险家、小提琴手和小棋手。我们也给这群卡通人物打造迈向Globbyland的神奇之旅。为此我们设计完整的视觉形象（visual identity）,尤其是课室风格塑造，设计元素是小熊热气球、儿童乐园、梦幻城堡，打造趣味无穷的环境空间，同时也让品牌别树一格，不被抄袭。',
						'result'      => '品牌风格塑造非常对味，客户认为我们非常细心，清楚他们所需所求，从学艺班的标志，到那几位鲜明灵活的卡通人物，还有故事情节设计，深受孩子们和家长们的一致喜爱，值得一提的是，我们注入的皮纹检测元素是市场上唯一做得那么生动有趣的学艺班，所有部分都让客户异常满意。',
						'client_name' => 'GLOBBYKIDZ',
					),
					'en' => array(
						'name'        => 'Key Image Development',
						'background'  => 'GlobbyKidz is children’s ticket to a journey full of discovery and exploration. By centralising all sorts of child development education programs together, parents won’t have to face problems of choosing anymore. Their programs emphasize on neuro-psychological developments to promote children’s creativity and productivity, language, and literacy for optimal brain learning and development to steer them on the right path in achieving their dreams.',
						'challenge'   => 'In creating something unique, we created the symbol for GlobbyKidz, a Bear face hot air balloon. Followed by 6 cartoonic characters: the Little Dancing Star, the Little Artist, the Little Bakerz, the Little Explorer & Adventurer, the Little Music Maestro, and the Little Chess Maestro. All with different & unique personalities and professions. And so, Globbyland was a magical, adventurous place created for the 6 characters which was embedded on GlobbyKidz’s visual identity. And with classroom-themed elements made up of Bear-shapes hot air balloons, playgrounds, fantasy castles, it is sure to brighten the hearts of children.',
						'result'      => 'We were vigilant and were heading on the same path as the client in terms of concept and style. The children and their parents were impressed and loved every bit of the program and the design. And according to survey, we were the only ones that were so emphatic and creative that we were the first to create something like this.',
						'client_name' => 'GLOBBYKIDZ',
					),
				),
				'year'        => '2014',
				'img_count'   => 10,
				'category_id' => 5,
			),
			array(
				'translation' => array(
					'cn' => array(
						'name'        => '企业形象建立',
						'background'  => 'KOSTKA STUDIO 是一家音乐学院，以乐器为主，在学院成立之时便找我们为他们设计品牌形象。',
						'challenge'   => '我们为客户设计品牌形象，诸如名片设计等等，协助他们在业务上体现整合形象。',
						'result'      => '我们们为客户选好颜色，以K为标志主要符号，客户很喜欢我们的作品，愿意找我们再次合作。',
						'client_name' => 'KOSTKA STUDIO',
					),
					'en' => array(
						'name'        => 'CORPORATE IMAGE DEVELOPMENT',
						'background'  => 'Kotska Studio is a musical based academy that we helped create a Brand Image during its foundation.',
						'challenge'   => 'We helped create a Corporate Identity for the client which included Name Card design and etc. to complete the client’s overall Branding Image.',
						'result'      => '“K” became our focus on creating Kotska Studio’s logo. The client was happy with our colour choice and our work. They are looking forward to working with us in the future.',
						'client_name' => 'KOSTKA STUDIO',
					),
				),
				'year'        => '2010',
				'img_count'   => 1,
				'category_id' => 5,
			),
			array(
				'translation' => array(
					'cn' => array(
						'name'        => '主要形象推广设计',
						'background'  => 'Auric Pacific Group Limited(“APGL”)乃东南亚跨国食品企业集团，事业版图跨越新加坡、马来西亚和印尼，主要业务为食品制造、分销、零售，以及餐饮业管理，合作伙伴有Post, Kelloggs, Pringles, McCormick, Anlene, Kraft, Heinz, Twinings, Abbott Laboratories以及李锦记等等。Auric Pacific旗下品牌繁多，食品类包括Sunshine, Top-One, SCS, Buttercup, Amor, Twin Cows, Mariette, Rocq Star以及Gourmet，餐饮业则有许多跨国品牌，如Delifrance, Food Junction, 1 Market,  alfafa, Toast@Work, eggs & berries, MEDZS, MALONE’S, 力宝轩以及上海丽轩，实力雄大。',
						'challenge'   => '客户每年都会参加各个展销会推广人事招聘，展位主题是“梦想”。2013年，客户希望我们公司能为他们设计系列POP道具，建立鲜明形象，吸引更多人潮，提高询问度。然而更具体的要求是希望我们设计的成品既能节省成本，也能提升销售效果。',
						'result'      => '我们改善客户以往的构图方式，运用我们对市场喜好的了解，加强整体设计的布局、采色，以及展销摊位摆设方法，从而打造系列POP设计，包括展位、宣传画册以及易拉宝等等，整体效果让客户非常满意。',
						'client_name' => 'AURIC PACIFIC',
					),
					'en' => array(
						'name'        => 'Key Image Development',
						'background'  => 'Auric Pacific Group Limited (APGL) is an investment holding company that involves a diverse range of businesses including the distribution of fast moving consumer food products, food manufacturing and retailing, and restaurant and food court management. APGL’s businesses and operations are present in Singapore, Malaysia, Hong Kong and China partnering with well-known global and household establishments like Post, Kelloggs, Pringles, McCormick, Anlene, Kraft, Heinz, Twinings, Abbott Laboratories, and Lee Kum Kee and a many more. APGL also markets and distributes its household brnads such as Sunshine, Top-One, SCS, Buttercup, Amor, Twin Cows, Mariette, Rocq Star and Gourmet. There is also food retailing which includes household names like Delifrance、Food Junction、1 Market、alfafa、Toast@Work、eggs & berries、MEDZS、MALONE’S, Lippo Chiuchow, and Li Xuan. All-in-all, APGL is no small business.',
						'challenge'   => 'Every year, you can find APGL’s presence in many exhibitions to promote and recruit by theming their exhibition booths with touches of “Dreams”. In 2013, the client approach us to design a range of POP props to raise awareness and get more people to inquire at APGL at the same time help them minimize their budget and improve their sales value.',
						'result'      => 'By using our understanding towards the market’s evaluations in terms of Layout, Colours, and Placement methods, we came up with a range of POP designs which included Exhibition Booths, Brochures & Buntings which outstood the previous designs. And this made the client very happy.',
						'client_name' => 'AURIC PACIFIC',
					),
				),
				'year'		  => '2013',
				'img_count'   => 13,
				'category_id' => 6,
			),
			array(
				'translation' => array(
					'cn' => array(
						'name'        => '企业形象设计',
						'background'  => '成立自2002年，联星一手包办选米、包装和销售，作为砂劳越市场占有率最大的米商，服务东马市场超过13年。',
						'challenge'   => '客户让我们为他们设计比现有包装设计更好看的设计作品，提升品牌观感之余，还能提升顾客喜好度，间接让产品销量更好。',
						'result'      => '在设计上我们汰劣留良，让整体形象变得很好看，销售量更甚提升至少20%，客户大为满意，甚至在听取我们为联星提议的品牌规划方案之后，决定让我们好好规划他们的企业形象。',
						'client_name' => 'Liansin（联星）子品牌 - mr.thai / Cap Amoi / Butterfly /Royal Chrysanthemum',
					),
					'en' => array(
						'name'        => 'cap amoi | mr.thai | butterfly royal chrsanthemum',
						'background'  => 'Liansin was founded in 2002 and has been serving rice products to East Malaysia since. Their in-house brand products are all fine-picked, packaged, and sold by Liansin themselves. They have now become one of Sarawak’s largest rice distributors.',
						'challenge'   => 'Liansin gave us the privilege to produce designs that could stand out more from their previous packaging designs. They wanted to capture the hearts of their audiences in doing so increase their sales by creating awareness.',
						'result'      => 'Our inferior and daring attempt to help Liansin create a better brand image has proven fruitful. Since the launch of their new rice packaging designs, their sales has gone up 20%! On top of that, Liansin has entrusted us to develop Branding Strategies to strengthen their image in the market!',
						'client_name' => 'Liansin（联星）sub-brand - mr.thai / Cap Amoi / Butterfly /Royal Chrysanthemum',
					),
				),
				'year'		  => '2014',
				'img_count'   => 7,
				'category_id' => 6,
			),
			array(
				'translation' => array(
					'cn' => array(
						'name'        => '企业形象设计',
						'background'  => '棠记兄弟饼家是传统家族传承的事业，是马来西亚特别著名的老字号饼家。棠记兄弟饼家创立于1970年，当年一天只卖出三十个蛋挞，现在却已是日销近万。从三十个到一万个、从一家到八家店面的岁月之中，蕴含了孔氏家族齐心奋斗的欢乐和汗水。四十多年来，棠记秉承传统制作的技术与方法，以诚为本的服务态度，让本土华人传统味道得以流传，大家方能品尝那股浓浓的人情味。',
						'challenge'   => '客户近年努力提升企业形象，市场所趋，客户非常想制作能完成网上购物的网站，同时也可以注入品牌重生的形象元素。',
						'result'      => '客户很满意我们设计与开发的自适应网页(responsive website)， 也很喜欢我们愿意跟进的服务态度。',
						'client_name' => 'TK BAKERY',
					),
					'en' => array(
						'name'        => 'corporate Image Development',
						'background'  => 'TK Bakery, a.k.a. Tong Kee Brothers Confectionery, is a traditional household name that is quite well known in Malaysia. Tong Kee is a family business run by the Hoong Family way back in 1970, only 30 egg tarts were sold daily. But times changed, and today, almost 10000 egg tarts are sold every day in all 8 branches. This is the result of years of dedication and immense passion by the Hoong family, delivering nothing but the best for their customers. Tong Kee promises to uphold and pass on the Chinese culture for generations to come.',
						'challenge'   => 'TK hopes to raise brand awareness among Malaysians. They plan to do so by hosting an E-commerce website to cope with the market trend and for customers to shop online.',
						'result'      => 'TK were very satisfied with their new innovative responsive website which gave their brand a new attitude.',
						'client_name' => 'TK BAKERY',
					),
				),
				'year'		  => '2014',
				'img_count'   => 4,
				'category_id' => 6,
			),
			array(
				'translation' => array(
					'cn' => array(
						'name'        => '企业短片制作',
						'background'  => 'IP Server One是一家提供网页寄存服务的公司，于2003年由李昶龙先生创立。凭着提供专业技术和良好服务，生意渐渐上了轨道，从成立时的孤军作战，到后来聘请许多科技领域的专才，公司日渐为客户提供更优质和更值得信赖的服务。',
						'challenge'   => '客户要着重网络行销，打算制作一支企业短片，通过youtube和官方网站的平台加以推广，吸引更多客户对他们的认识，加深印象，并加速成交过程。',
						'result'      => '我们为客户构思一个故事，把原文乏味的企业信息添加趣味，并在文案里创造一个代表客户公司的图像人物。整支短片内容丰富且非常有趣，客户非常满意我们竟能把原本冗长的信息量浓缩为精彩的故事短片，计划在youtube宣传之后再做短片续集。',
						'client_name' => 'IP SERVER ONE',
					),
					'en' => array(
						'name'        => 'CORPORATE VIDEO',
						'background'  => 'IP Server One was once a one-man company which started in 2003 and has now grown to become one of the most leading web hosting provider in Malaysia with over 30 professionals dedicated to bringing customers the best web hosting solutions. ',
						'challenge'   => 'The client wanted something that could levitate their business by educating audiences about IP Server One. Hence, they wanted us to create an animated motion graphics video commercial to be broadcasted on Youtube.',
						'result'      => 'With a story to tell, we managed to liven up the message that the client wanted to convey to the audiences. The commercial was a superhero-super villain themed animation that is at the same time narrated with context related to the client’s business. The client was pleased with our work and plans to have a sequel for their commercial.',
						'client_name' => 'IP SERVER ONE',
					),
				),
				'year'		  => '2015',
				'img_count'   => 13,
				'category_id' => 7,
			),
			array(
				'translation' => array(
					'cn' => array(
						'name'        => '企业形象设计',
						'background'  => 'PLT作为数据存储公司，有着完善的数据保安系统，24/7的不间断的远程管理服务，网络监督与系统管理，提供多层保护灾难恢复方案、运营商维护服务，以及大电量设备的支援、主机代管等等，只求能让顾客企业得到最安全的资料收藏。PLT主张维护顾客企业安全、绝对连线、确保获利。客户曾因形立方缺乏相关行业的案例而忧心，深怕我们无法完成客户所需要的企业画册以及网页设计，原因是客户非常需要有相关行业了解才能设计有专业深度的作品，撰文尤其重要，必需视该行业人士才能理解的艰涩专有词句。',
						'challenge'   => '客户需要我们设计一份文案特好的企业画册，表明说必须要有专业撰稿人，否则恐怕写不出专有词语。',
						'result'      => '有赖于客户的信任，形立方终究得到尝试的机会。经过深入研究PLT的市场与定位，也凭借形立方专业的形象整合的经验，把科技数据的无趣感转为人性化。我们顺利在指定时间内把作品完成，协助客户短时间以科技感形象亮相，突显企业产品的高尚风格，不但没有脱离该行业的专业感，还能打造出独特的人性味道。客户特别高兴我们的作品，就连设计巧思也特别好，能让看过的人容易记得这份企业画册，客户也反映业绩也因此特别显著。',
						'client_name' => 'PACIFIC LINKTEL',
					),
					'en' => array(
						'name'        => 'CORPORATE IMAGE DEVELOPMENT',
						'background'  => 'Pacific Link Tel is a premier collocation and data centre management company that has one of the best secured data colocation system and a 24/7 security management monitoring the entire system. PLT also provides disaster recovery solutions and protection with backup power on standby, operators, and maintenance services that brings nothing but the best in promising customers a secured data storage centre. PLT promises both guaranteed connectivity and profit for customers. This project was a challenge for us because we needed to suppress the client’s doubt in our ability. ',
						'challenge'   => 'The client wanted us to design a Corporate Profile than could equally stand out and is linguistically unique in every way. ',
						'result'      => 'Not only did our design stood out from the rest, it also impressed the client and furthermore our creativity in creating Fortson’s Property Catalogue has increased their sales in a short amount of time.',
						'client_name' => 'PACIFIC LINKTEL',
					),
				),
				'year'		  => '2014',
				'img_count'   => 4,
				'category_id' => 7,
			),
			array(
				'translation' => array(
					'cn' => array(
						'name'        => '产品上市形象设计',
						'background'  => 'Hairdepot从澳洲引进一系列有机护发产品，主要卖点就在配方成分里的阿甘油。客户希望我们形立方能为他们构思产品上市方案，并且考量如何在广告上推广产品特色阿甘油。',
						'challenge'   => '形立方深入分析Greenology品牌定位，结合各个方面的调研分析，得知阿甘树被当地人称之为“生命之树”，原因是它的根部有足够力量深入地底寻找水源，同时能抓住土壤，维持蓄水的功能。有了阿甘树，摩洛哥南部次干旱地区的生态才有存活希望。而阿甘油富含不饱和脂肪和抗氧化功能，能快速修复受损发丝和毛囊，凭着优于橄榄油2倍以上的维生素E，Greenology能滋养头皮，预防头发分叉受损，为头发增添健康光泽。由此我们设计产品标语为“有机人生，从头开始用生命之树的成分[阿甘油]，滋养头皮细胞真正需求”。从海报设计开始，客户落实设计方向之后，我们便展开一系列完整的形象道具设计。',
						'result'      => '客户喜欢我们设计海报的心思，从资料搜查到产品定位都兼顾得非常好，由此开始我们的合作关系更进一步。',
						'client_name' => 'Hairdepot 子品牌 - Greenology',
					),
					'en' => array(
						'name'        => 'MARKET Image Development',
						'background'  => 'Hairdepot introduced a range of organic hair care products from Australia. What’s special about these products is what lies within – Argan Oil. We were assigned to hatch a strategic marketing plan for them to promote their Argan Oil featured products.',
						'challenge'   => 'After gathering countless research on Greenology’s brand positioning and analysis from various aspects, the Argan Tree is also known as the “Tree of Life”. The name comes from the tree’s unique ability to store water by plunging its roots deep within the ground in search of water and reinforcing the earth and soil around it. Providing life and giving hope to the ecosystems and habitats to the droughts of Southern Morocco. Argan Oil contains unsaturated fats and anti-oxidants that can repair damaged hair and scalp twice as good as olive oil and Vitamin E. Greenology helps nourish the scalp, and adds a protective layer to prevent any future hair damage. And so Greenology was given a slogan “Pure Organic Life, Pure Healthy Hair”. Once the client approved of our concept and confirmed that we were heading down the right path on their poster design, we set on to complete the rest.',
						'result'      => 'The client was pleased with the amount of effort we put into creating Greenology’s poster and the attention to details we cared so much. Thus, strengthening our partnership bond.',
						'client_name' => 'Hairdepot Sub-brand - Greenology',
					),
				),
				'year'		  => '2014',
				'img_count'   => 4,
				'category_id' => 8,
			),
			array(
				'translation' => array(
					'cn' => array(
						'name'        => '产品上市形象设计',
						'background'  => 'Hairdepot开创一条新的产品线，主要以年轻人为市场对象，因此在产品形象设计上的元素必须以年轻人品味喜好为主。在之前合作愉快的前提下，客户愿意让我们设计新产品形象包装。',
						'challenge'   => '作为产品素材之一，洗发剂也偏稠白，这产品主要特色为牛奶。以此为由，产品定位是”Your Daily Hair Milk”，表示使用这产品如同喝牛奶一般，每日都可用这护发素。顺理成章，我们采用奶牛形象，设计出一系列的包装和宣传品，包括的奶牛造型的人形立牌，并带出趣味简洁风格。',
						'result'      => '主要以黑白蓝色作为主色调，画面力求简洁。我们设计的产品外观以及吉祥物大大刺激销售业绩，客户对我们此次作品表示异常激赏。',
						'client_name' => 'Hairdepot 子品牌 - Hairmilk',
					),
					'en' => array(
						'name'        => 'MARKET IMAGE DEVELOPMENT',
						'background'  => 'Hair Milk is a new range of products by Hairdepot mainly targeting the younger generations. Thus, the concept would have to be fancied by them as well. The client was happy to let us handle this project and come up with attractive packaging designs.',
						'challenge'   => 'Milk was used in the process of creating Hair Milk products and therefore explains the white featured shampoos. The slogan “Your Daily Hair Milk” is a way of saying that milk could be taken on a daily basis and so are Hair Milk series shampoos. Cows were used as mediums to portray a range of advertising materials including a Standee Mascot of a cow.',
						'result'      => 'We focused on colours like Black, White, and Blue as our main colour choices and we chose a minimalistic path in create our designs. The outcome was increased sales and a “Job Well Done” by our client.',
						'client_name' => 'Hairdepot Sub-brand - Hairmilk',
					),
				),
				'year'		  => '2014',
				'img_count'   => 5,
				'category_id' => 8,
			),
			array(
				'translation' => array(
					'cn' => array(
						'name'        => '广告促销推广设计',
						'background'  => '有鉴于护发类产品日益增大的市场需求，客户从理发院转型为护发品专门店，凭过去30年相关行业的经验，客户业务在短短几年时间内急速发展，再加上周详规划安排分店地点，还有其上百种品牌、上千件商品，Hairdepot如今已是马来西亚护发品领导品牌之一。',
						'challenge'   => '从2007年开始，我们跟着客户一同成长，从数间门市到今天数十间店面，我们为客户设计统一性的品牌形象，包括标志、风格取向、布局设计等等，提升企业整体形象。秉承“以客户为本”的服务理念，客户强调他们要为消费者提供一站式全面人性化的服务，除了多元的产品类别，还讲求导购员必须与顾客互动，让顾客感受轻松和愉悦的购物体验，满足消费者的购物需求。客户也提供更具竞争力的厂家价格、完善的物流与售后服务系统，以及商品定制等等各项以客为尊的服务，为求顾客购物过程流畅舒服。2015年，凭着这股热忱，客户与形立方携手打造Hairdepot独特的连锁经营视觉形象，整理一份适合不同大小的店面设计标准。从标志重塑开始，经过调研分析，以及与客户多番讨论，创造出由反白H字象征微笑的眼睛，和紫粉红D字象征的对话框结合的主要标志，表示名字缩写之外，也表达Hairdepot以快乐购物体验为本的服务精神。最后，我们采用紫粉红作为企业颜色，是因为这颜色有活力和雀跃视觉效果。',
						'result'      => '客户很满意我们对他们品牌的解读，也很喜欢我们对他们品牌塑造的形象设计，包括独特的形状、吉祥物、花纹图案等等，整体形象在终端和宣传品上发挥良好，广受好评，成功将该品牌提升更高层次。',
						'client_name' => 'HAIRDEPOT',
					),
					'en' => array(
						'name'        => 'ADVERTISING DESIGN PROMOTION',
						'background'  => 'Hairdepot started out as a Hair Salon, then later became a hair care product specialist business and is now one of Malaysia’s fastest growing business. With over 30 years of experience in the field, Hairdepot has many branches around Malaysia today ready to serve Malaysians with a wide range of hair care products.',
						'challenge'   => 'Throughout our partnership with Hairdepot since 2007, we have played a huge role in terms of design and their business growth. Hairdepot wanted to become a One-Stop-Solution place for customers to shop at by providing them with a huge range of hair care products, and consultants that would interact with their customers to listen to their needs. To summarise, Hairdepot is highly emphasizing on user experience and satisfaction. In 2015, the client approached us and together Hairdepot was born along with their corporate identity for all their branches. We rebranded Hairdepot by giving the logo a “smiling H” which symbolises customers’ satisfaction when they shop at Hairdepot. We chose pink as Hairdepot’s vibrant and exciting identity.',
						'result'      => 'Our interpretation of Hair Depot has made the client very happy. They were very satisfied with the way we rebranded their identity and that we created a Mascot for their business. And yes, we successfully improved another brand and made a happy customer.',
						'client_name' => 'HAIRDEPOT',
					),
				),
				'year'		  => '2007',
				'img_count'   => 15,
				'category_id' => 8,
			),
			array(
				'translation' => array(
					'cn' => array(
						'name'        => '产品上市形象设计',
						'background'  => 'Hairdepot开创的另一条新的产品线，主要以对护发产品特别有要求、特别专业的人为市场对象，因此在产品形象设计上的元素必须针对长期使用护发产品有高要求的顾客群。在之前合作愉快的前提下，客户愿意让我们设计新产品形象包装。',
						'challenge'   => '由于客户想让产品有有日本时尚风味，于是我们把产品打造成“东京四大护发”形象，化身为电影主角，在海报上呈现出电影海报质感。同时也把这个海报形象放在杂志广告、册子设计等等。',
						'result'      => '我们成功塑造东京街头时尚风，主题性强烈，达至客户所要的产品形象。',
						'client_name' => 'Hairdepot 子品牌 - Midori Advanced',
					),
					'en' => array(
						'name'        => 'MARKET Image Development',
						'background'  => 'When it comes to a new range of hair care products, Hairdepot is very particular about the design. Especially with the Midori Advance Series which targets professionals. We were given this opportunity to design something that could suit people with high demands and needs in the long run. ',
						'challenge'   => 'The client wanted the style to be something straight out of Japan, Hence, we named the series “The 4 Hair Guardians of Tokyo” and the whole concept of the design looked like a poster for an upcoming superhero blockbuster movie. The design was later applied in magazines and leaflets as well.',
						'result'      => 'Yet another successful attempt at creating a bold and trendy concept and impressing the client.',
						'client_name' => 'Hairdepot Sub-brand - Midori Advanced',
					),
				),
				'year'		  => '2012',
				'img_count'   => 5,
				'category_id' => 8,
			),
			array(
				'translation' => array(
					'cn' => array(
						'name'        => '产品上市形象设计',
						'background'  => 'Hairdepot打算新创健康药材的护发产品系列。需要我们设计出现代东方的护发产品形象。五行健康是东方保健文化特色，所谓的五行指的是金木水火土五大元素，相生相息，缺一不可，《本草纲目》里有更详细的记载说明。',
						'challenge'   => '客户希望我们能善用五行元素为产品设计的概念，主要对象是一群较为喜欢东方治疗理念的对象群。',
						'result'      => '形立方采用5种东方简约风，并用5种不同颜色与图案，让产品看起来利落干脆，却也不失东方韵味。',
						'client_name' => 'Hairdepot 子品牌 - 本草集',
					),
					'en' => array(
						'name'        => 'market image development',
						'background'  => 'Herbal hair care products? Yes. Hairdepot plans to introduce a new line of products and assigned us to create an oriental design that could accommodate the five elements of the oriental cultures.',
						'challenge'   => 'By targeting an audience that fancy oriental based hair care products, we proceeded by applying the five oriental elements into our design.',
						'result'      => 'The result that came out was a minimalistic way of bringing out all five elements with different styles, patterns, and colours to make them look neat without losing the charm.',
						'client_name' => 'Hairdepot Sub-brand - BEN CAO JI',
					),
				),
				'year'		  => '2014',
				'img_count'   => 2,
				'category_id' => 8,
			),
		);

		$count = 0;

		foreach ($projects as $project)
		{
			$proj = New Project;
			$proj->category_id    = $project['category_id'];
			$proj->grid_img_id    = ++$lastFileId;
			$proj->grid_bg_img_id = ++$lastFileId;
			$proj->brand_img_id   = ++$lastFileId;
			$proj->pri_color_code = '#6666FF';
			$proj->sec_color_code = '#6699FF';
			$proj->txt_color_code = '#8C0039';
			$proj->year           = $project['year'];
			$proj->sort_order     = $count++;
			$proj->save();

			foreach ($project['translation'] as $key => $val)
			{
				$locale = Locale::where('language', '=', $key)->first();

				$projTranslation = new ProjectTranslation;
				$projTranslation->project_id  = $proj->id;
				$projTranslation->locale_id   = $locale->id;
				$projTranslation->name        = $val['name'];
				$projTranslation->background  = $val['background'];
				$projTranslation->challenge   = $val['challenge'];
				$projTranslation->result      = $val['result'];
				$projTranslation->founder     = 'Jerry Young';
				$projTranslation->client_name = $val['client_name'];
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