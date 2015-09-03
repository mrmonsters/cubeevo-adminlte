<?php

use Illuminate\Database\Seeder;
use App\Models\Locale;
use App\Models\Files;
use App\Models\Category;
use App\Models\CategoryTranslation;

class CategoryTableSeeder extends Seeder 
{
	public function run()
	{
		// First file to be seeded
		$lastFileId = 0;

		$files = array(
			array(
				'name'   => 'WorldTop_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Thumbnail/WorldTop_Thumbnail.png',
			),
			array(
				'name'   => 'WorldTop_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Thumbnail/WorldTop_Thumbnail_Background.jpg',
			), 
			array(
				'name'   => 'RHB_FunFacts_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Thumbnail/RHB_FunFacts_Thumbnail.png',
			),
			array(
				'name'   => 'RHB_FunFacts_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Thumbnail/RHB_FunFacts_Thumbnail_Background.jpg',
			), 
			array(
				'name'   => 'Sunshine_Website_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Thumbnail/Sunshine_Website_Thumbnail.png',
			),
			array(
				'name'   => 'Sunshine_Website_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Thumbnail/Sunshine_Website_Thumbnail.jpg',
			),
			array(
				'name'   => 'Fortson_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Thumbnail/Fortson_Thumbnail.png',
			),
			array(
				'name'   => 'Fortson_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Thumbnail/Fortson_Thumbnail_Background.jpg',
			), 
			array(
				'name'   => 'Globbykidz_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Thumbnail/Globbykidz_Thumbnail.png',
			),
			array(
				'name'   => 'Globbykidz_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Thumbnail/Globbykidz_Thumbnail_Background.jpg',
			),  
			array(
				'name'   => 'LianSin_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Thumbnail/LianSin_Thumbnail.png',
			),
			array(
				'name'   => 'LianSin_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Thumbnail/LianSin_Thumbnail.jpg',
			), 
			array(
				'name'   => 'PLT_Website_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Thumbnail/PLT_Website_Thumbnail.png',
			),
			array(
				'name'   => 'PLT_Website_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Thumbnail/PLT_Website_Thumbnail_Background.jpg',
			), 
			array(
				'name'   => 'Hairdepot_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Thumbnail/Hairdepot_Thumbnail.png',
			),
			array(
				'name'   => 'Hairdepot_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Thumbnail/Hairdepot_Thumbnail_Background.jpg',
			),
		);

		$counter = 0 ;
		foreach ($files as $file)
		{
			$file = Files::create($file);
			if($counter == 0):
				$increment_file_id = $file->id;
				$counter++;
			endif;
		}

		$categories = array(
			array(
				'translation' => array(
					'cn' => array(
						'name' => '型在汽车业',
					),
					'en' => array(
						'name' => 'Automotive',
					),
				),
				'slug'       => 'automotive',
				'sort_order' => '7',
			),
			array(
				'translation' => array(
					'cn' => array(
						'name' => '型在金融业',
					),
					'en' => array(
						'name' => 'Banking',
					),
				),
				'slug'       => 'banking',
				'sort_order' => '4',
			),
			array(
				'translation' => array(
					'cn' => array(
						'name' => '型在美容业',
					),
					'en' => array(
						'name' => 'Beauty',
					),
				),
				'slug'       => 'beauty',
				'sort_order' => '2',
			),
			array(
				'translation' => array(
					'cn' => array(
						'name' => '型在房产业',
					),
					'en' => array(
						'name' => 'Developer',
					),
				),
				'slug'       => 'developer',
				'sort_order' => '6',
			),
			array(
				'translation' => array(
					'cn' => array(
						'name' => '型在教学业',
					),
					'en' => array(
						'name' => 'Education',
					),
				),
				'slug'       => 'education',
				'sort_order' => '5',
			),
			array(
				'translation' => array(
					'cn' => array(
						'name' => '型在餐饮业',
					),
					'en' => array(
						'name' => 'F&B',
					),
				),
				'slug'       => 'f&b',
				'sort_order' => '1',
			),
			array(
				'translation' => array(
					'cn' => array(
						'name' => '型在电子业',
					),
					'en' => array(
						'name' => 'IT',
					),
				),
				'slug'       => 'it',
				'sort_order' => '3',
			),
			array(
				'translation' => array(
					'cn' => array(
						'name' => '型在零售业',
					),
					'en' => array(
						'name' => 'Retailer',
					),
				),
				'slug'       => 'retailer',
				'sort_order' => '0',
			),
		);

		$count = 0;
		$increment_file_id = $increment_file_id - 1;
		foreach ($categories as $category)
		{ 
			$cat = New Category;
			$cat->grid_img_id    = ++$increment_file_id;
			$cat->grid_bg_img_id = ++$increment_file_id;
			$cat->slug 			 = $category['slug'];
			$cat->sort_order     = $category['sort_order'];
			$cat->save();

			foreach ($category['translation'] as $key => $val)
			{
				$locale = Locale::where('language', '=', $key)->first();

				$catTranslation = new CategoryTranslation;
				$catTranslation->category_id = $cat->id;
				$catTranslation->locale_id   = $locale->id;
				$catTranslation->name        = $val['name'];
				$catTranslation->save();
			}
		}
	}

}