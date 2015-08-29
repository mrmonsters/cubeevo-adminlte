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
				'name'   => 'Hairdepot_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Thumbnail/Hairdepot_Thumbnail.png',
			),
			array(
				'name'   => 'Hairdepot_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Thumbnail/Hairdepot_Thumbnail_Background.jpg',
			),
			array(
				'name'   => 'Greenology_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Thumbnail/Greenology_Thumbnail.png',
			),
			array(
				'name'   => 'Greenology_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Thumbnail/Greenology_Thumbnail_Background.jpg',
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
				'name'   => 'HairMilk_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Thumbnail/HairMilk_Thumbnail.png',
			),
			array(
				'name'   => 'HairMilk_Thumbnail_Background',
				'type'   => 'image/jpeg',
				'dir'    => '/img/Credential Thumbnail/HairMilk_Thumbnail_Background.jpg',
			),
		);

		foreach ($files as $file)
		{
			Files::create($file);
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
			),
		);

		$count = 0;

		foreach ($categories as $category)
		{
			// Reset to reuse image
			if ($lastFileId == 8)
			{
				$lastFileId = 0;
			}

			$cat = New Category;
			$cat->grid_img_id    = ++$lastFileId;
			$cat->grid_bg_img_id = ++$lastFileId;
			$cat->sort_order     = $count++;
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