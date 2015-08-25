<?php

use Illuminate\Database\Seeder;
use App\Models\Locale;
use App\Models\Files;
use App\Models\Attribute;
use App\Models\AttributeValue;

class ProjectTableSeeder extends Seeder 
{
	public function run()
	{
		$lastFileId = ($id = Files::where('status', '=', '2')->get()->last()->id) ? $id : 0;

		$files = array(
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
		);

		foreach ($files as $file)
		{
			Files::create($file);
		}

		$values = array(
			'19' => array(
				'name' => array(
					'en' => 'World Top',
				),
				'desc' => array(
					'en' => 'World Top project details.'
				),
				'bg_img_id'  => ++$lastFileId,
				'sort_order' => '0',
			),
			'20' => array(
				'name' => array(
					'en' => 'RHB',
				),
				'desc' => array(
					'en' => 'RHB project details.'
				),
				'img_id'	 => ++$lastFileId,
				'bg_img_id'  => ++$lastFileId,
				'sort_order' => '1',
			),
			'21' => array(
				'name' => array(
					'en' => 'Sunshine',
				),
				'desc' => array(
					'en' => 'Sunshine project details.'
				),
				'img_id'	 => ++$lastFileId,
				'bg_img_id'  => ++$lastFileId,
				'sort_order' => '2',
			),
			'22' => array(
				'name' => array(
					'en' => 'Fortson',
				),
				'desc' => array(
					'en' => 'Fortson project details.'
				),
				'img_id'	 => ++$lastFileId,
				'bg_img_id'  => ++$lastFileId,
				'sort_order' => '3',
			),
			'23' => array(
				'name' => array(
					'en' => 'Globbykidz',
				),
				'desc' => array(
					'en' => 'Globbykidz project details.'
				),
				'img_id'	 => ++$lastFileId,
				'bg_img_id'  => ++$lastFileId,
				'sort_order' => '4',
			),
			'24' => array(
				'name' => array(
					'en' => 'Kostka',
				),
				'desc' => array(
					'en' => 'Kostka project details.'
				),
				'img_id'	 => ++$lastFileId,
				'bg_img_id'  => ++$lastFileId,
				'sort_order' => '5',
			),
		);
		
		foreach ($values as $key => $val)
		{
			foreach ($val as $code => $item)
			{
				$attr = Attribute::where('code', '=', $code)->first();

				if (is_array($item))
				{
					foreach ($item as $loc => $value)
					{
						$locale = Locale::where('code', '=', $loc)->first();

						$attrValue = new AttributeValue;
						$attrValue->attribute_id = $attr->id;
						$attrValue->entity_instance_id = $key;
						$attrValue->value = $value;
						$attrValue->locale_id = $locale->id;
						$attrValue->save();
					}
				}
				else
				{
					$attrValue = new AttributeValue;
					$attrValue->attribute_id = $attr->id;
					$attrValue->entity_instance_id = $key;
					$attrValue->value = $item;
					$attrValue->save();
				}
			}
		}

	}

}