<?php

use Illuminate\Database\Seeder;
use App\Models\Locale;
use App\Models\Files;
use App\Models\Entity;
use App\Models\EntityInstance;
use App\Models\Attribute;
use App\Models\AttributeValue;

class SolutionTableSeeder extends Seeder 
{
	public function run()
	{
		$lastFileId = ($id = Files::where('status', '=', '2')->get()->last()->id) ? $id : 0;

		$files = array(
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
		);

		foreach ($files as $file)
		{
			Files::create($file);
		}

		$bgImgId = ($id = Files::where('status', '=', '2')->get()->last()->id) ? $id : 0;

		$lastInstanceId = ($id = EntityInstance::where('status', '=', '2')->get()->last()->id) ? $id : 0;

		$instance = array(
			'entity_id' => '3',
			'status'    => '2'
		);

		for ($i = 0; $i < 9; $i++)
		{
			EntityInstance::create($instance);
		}

		$solutions = array(
			array(
				'name' => array(
					'cn' => '品牌形象策划',
				),
				'desc' => array(
					'cn' => '从标志，采色，构图，字形到标语，我们的责任就是为客户塑造显著的品牌视觉形象。',
				),
				'bg_color_code' => '#eee80a',
			),
			array(
				'name' => array(
					'cn' => '广告方案策划',
				),
				'desc' => array(
					'cn' => '我们能按照客户需求与预算安排广告策划，包括平面媒体，户外媒体，广播媒体和网络媒体。',
				),
				'bg_color_code' => '#1f9ea0',
			),
			array(
				'name' => array(
					'cn' => '广播广告策划',
				),
				'desc' => array(
					'cn' => '包办广播电台广告与电视广告的脚本撰写，演员道具准备以及拍摄录制。',
				),
				'bg_color_code' => '#c63f48',
			),
			array(
				'name' => array(
					'cn' => '包装设计',
				),
				'desc' => array(
					'cn' => '我们为客户设计产品包装，无论是盒装或是标签设计都在服务范畴。',
				),
				'bg_color_code' => '#F7941E',
			),
			array(
				'name' => array(
					'cn' => '数码设计',
				),
				'desc' => array(
					'cn' => '泛指数码媒体上的设计，含括网页，手机应用程序网络宣传主图，以及动态图设计。',
				),
				'bg_color_code' => '#45B97C',
			),
			array(
				'name' => array(
					'cn' => '平面设计',
				),
				'desc' => array(
					'cn' => '我们平面设计包括宣传单，海报，折页，画册，布条，挂条，平面广告，招牌，广告牌，书刊等。',
				),
				'bg_color_code' => '#8F53A1',
			),
			array(
				'name' => array(
					'cn' => '平面摄影',
				),
				'desc' => array(
					'cn' => '我们能为客户的产品，代言人和活动安排摄影。',
				),
				'bg_color_code' => '#8F53A1',
			),
			array(
				'name' => array(
					'cn' => '文案撰写',
				),
				'desc' => array(
					'cn' => '我们能为可撰写活动流程，产品特性，品牌故事，新闻稿等等，也涵盖国语，英语与华语的翻译。',
				),
				'bg_color_code' => '#eee80a',
			),
			array(
				'name' => array(
					'cn' => '打印服务',
				),
				'desc' => array(
					'cn' => '我们提供印刷服务，包括平面印刷，立体制作，布景制作，制服制作等。',
				),
				'bg_color_code' => '#1f9ea0',
			),
		);

		$solCount = 0;

		foreach ($solutions as $solution)
		{
			$values = array(
				++$lastInstanceId => array(
					'name' => array(
						'cn' => $solution['name']['cn'],
					),
					'desc' => array(
						'cn' => $solution['desc']['cn'],
					),
					'bg_color_code' => $solution['bg_color_code'],
					'bg_img_id'     => $bgImgId,
					'img_id'        => ++$lastFileId,
					'sort_order'	=> $solCount,
				),
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

			$solCount++;
		}
	}

}