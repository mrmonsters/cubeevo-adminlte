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
			),
			array(
				'name' => array(
					'cn' => 'Fun Facts (RHB)',
				),
				'desc' => array(
					'cn' => 'Fun Facts (RHB) description.',
				),
			),
			array(
				'name' => array(
					'cn' => 'WOTD (RHB)',
				),
				'desc' => array(
					'cn' => 'WOTD (RHB) description.',
				),
			),
			array(
				'name' => array(
					'cn' => 'Sunshine',
				),
				'desc' => array(
					'cn' => 'Sunshine description.',
				),
			),
			array(
				'name' => array(
					'cn' => 'Fortson',
				),
				'desc' => array(
					'cn' => 'Fortson description.',
				),
			),
			array(
				'name' => array(
					'cn' => 'Globbykidz',
				),
				'desc' => array(
					'cn' => 'Globbykidz description.',
				),
			),
			array(
				'name' => array(
					'cn' => 'Kostka',
				),
				'desc' => array(
					'cn' => 'Kostka description.',
				),
			),
			array(
				'name' => array(
					'cn' => 'Auric Pacific',
				),
				'desc' => array(
					'cn' => 'Auric Pacific description.',
				),
			),
			array(
				'name' => array(
					'cn' => 'Lian Sin',
				),
				'desc' => array(
					'cn' => 'Lian Sin description.',
				),
			),
			array(
				'name' => array(
					'cn' => 'TK',
				),
				'desc' => array(
					'cn' => 'TK description.',
				),
			),
			array(
				'name' => array(
					'cn' => 'IP Server One',
				),
				'desc' => array(
					'cn' => 'IP Server One description.',
				),
			),
			array(
				'name' => array(
					'cn' => 'PLT',
				),
				'desc' => array(
					'cn' => 'PLT description.',
				),
			),
			array(
				'name' => array(
					'cn' => 'Greenology',
				),
				'desc' => array(
					'cn' => 'Greenology description.',
				),
			),
			array(
				'name' => array(
					'cn' => 'Hair Milk',
				),
				'desc' => array(
					'cn' => 'Hair Milk description.',
				),
			),
			array(
				'name' => array(
					'cn' => 'Hairdepot',
				),
				'desc' => array(
					'cn' => 'Hairdepot description.',
				),
			),
			array(
				'name' => array(
					'cn' => 'Midori',
				),
				'desc' => array(
					'cn' => 'Midori description.',
				),
			),
		);

		$proCount = 0;

		foreach ($projects as $project)
		{
			$values = array(
				++$lastInstanceId => array(
					'name' => array(
						'cn' => $project['name']['cn']
					),
					'desc' => array(
						'cn' => $project['desc']['cn']
					),
					'img_id' 	 => ++$lastFileId,
					'bg_img_id'  => ++$lastFileId,
					'sort_order' => $proCount,
				)
			);

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

}