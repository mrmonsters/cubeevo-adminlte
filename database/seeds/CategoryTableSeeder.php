<?php

use Illuminate\Database\Seeder;
use App\Models\Locale;
use App\Models\Files;
use App\Models\Entity;
use App\Models\EntityInstance;
use App\Models\Attribute;
use App\Models\AttributeValue;

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
				'name'   => 'Greenology_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Thumbnail/Greenology_Thumbnail.png',
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
				'name'   => 'PLT_Website_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Thumbnail/PLT_Website_Thumbnail.png',
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
				'name'   => 'HairMilk_Thumbnail',
				'type'   => 'image/png',
				'dir'    => '/img/Credential Thumbnail/HairMilk_Thumbnail.png',
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

		// First instance to be seeded
		$lastInstanceId = 0;

		$instance = array(
			'entity_id' => '1',
			'status'    => '2'
		);

		for ($i = 0; $i < 8; $i++)
		{
			EntityInstance::create($instance);
		}

		$categories = array(
			array(
				'cn' => '型在汽车业',
				'en' => 'Automotive',
			),
			array(
				'cn' => '型在金融业',
				'en' => 'Banking',
			),
			array(
				'cn' => '型在美容业',
				'en' => 'Beauty',
			),
			array(
				'cn' => '型在房产业',
				'en' => 'Developer',
			),
			array(
				'cn' => '型在教学业',
				'en' => 'Education',
			),
			array(
				'cn' => '型在餐饮业',
				'en' => 'F&B',
			),
			array(
				'cn' => '型在电子业',
				'en' => 'IT',
			),
			array(
				'cn' => '型在零售业',
				'en' => 'Retailer',
			),
		);

		$catCount = 0;

		foreach ($categories as $cat)
		{
			// Reset to reuse image
			if ($lastFileId == 8)
			{
				$lastFileId = 0;
			}

			$value = array(
				++$lastInstanceId => array(
					'name' => array(
						'cn' => $cat['cn'],
						'en' => $cat['en'],
					),
					'img_id' 	 => ++$lastFileId,
					'bg_img_id'  => ++$lastFileId,
					'sort_order' => $catCount,
				),
			);

			foreach ($value[$lastInstanceId] as $code => $item)
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

			$catCount++;
		}
	}

}