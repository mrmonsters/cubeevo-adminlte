<?php

use Illuminate\Database\Seeder;
use App\Models\Status;
use App\Models\Locale;
use App\Models\Files;
use App\Models\Solution;
use App\Models\SolutionTranslation;

class SolutionTableSeeder extends Seeder 
{
	public function run()
	{
		$lastFileId = ($id = Files::where('status', '=', STATUS::ACTIVE)->get()->last()->id) ? $id : 0;

		$files = array(
			array(
				'name'   => 'solutionIcon1',
				'type'   => 'image/png',
				'dir'    => '/img/solutionIcon1.png',
			),
			array(
				'name'   => 'solutionIcon2',
				'type'   => 'image/png',
				'dir'    => '/img/solutionIcon2.png',
			),
			array(
				'name'   => 'solutionIcon3',
				'type'   => 'image/png',
				'dir'    => '/img/solutionIcon3.png',
			),
			array(
				'name'   => 'solutionIcon4',
				'type'   => 'image/png',
				'dir'    => '/img/solutionIcon4.png',
			),
			array(
				'name'   => 'solutionIcon5',
				'type'   => 'image/png',
				'dir'    => '/img/solutionIcon5.png',
			),
			array(
				'name'   => 'solutionIcon6',
				'type'   => 'image/png',
				'dir'    => '/img/solutionIcon6.png',
			),
			array(
				'name'   => 'solutionIcon7',
				'type'   => 'image/png',
				'dir'    => '/img/solutionIcon7.png',
			),
			array(
				'name'   => 'solutionIcon8',
				'type'   => 'image/png',
				'dir'    => '/img/solutionIcon8.png',
			),
			array(
				'name'   => 'solutionIcon9',
				'type'   => 'image/png',
				'dir'    => '/img/solutionIcon9.png',
			),
			array(
				'name'   => 'Images-36',
				'type'   => 'image/png',
				'dir'    => '/img/Images-36.png',
			),
		);

		foreach ($files as $file)
		{
			Files::create($file);
		}

		$bgImgId = ($id = Files::where('status', '=', STATUS::ACTIVE)->get()->last()->id) ? $id : 0;

		$solutions = array(
			array(
				'pri_color_code' => '#eee80a',
				'translation' => array(
					'cn' => array(
						'name' => '品牌形象策划',
						'desc' => '从标志，采色，构图，字形到标语，我们的责任就是为客户塑造显著的品牌视觉形象。',
					),
				),
			),
			array(
				'pri_color_code' => '#1f9ea0',
				'translation' => array(
					'cn' => array(
						'name' => '广告方案策划',
						'desc' => '我们能按照客户需求与预算安排广告策划，包括平面媒体，户外媒体，广播媒体和网络媒体。',
					),
				),
			),
			array(
				'pri_color_code' => '#c63f48',
				'translation' => array(
					'cn' => array(
						'name' => '广播广告策划',
						'desc' => '包办广播电台广告与电视广告的脚本撰写，演员道具准备以及拍摄录制。',
					),
				),
			),
			array(
				'pri_color_code' => '#45B97C',
				'translation' => array(
					'cn' => array(
						'name' => '包装设计',
						'desc' => '我们为客户设计产品包装，无论是盒装或是标签设计都在服务范畴。',
					),
				),
			),
			array(
				'pri_color_code' => '#45B97C',
				'translation' => array(
					'cn' => array(
						'name' => '数码设计',
						'desc' => '泛指数码媒体上的设计，含括网页，手机应用程序网络宣传主图，以及动态图设计。',
					),
				),
			),
			array(
				'pri_color_code' => '#8F53A1',
				'translation' => array(
					'cn' => array(
						'name' => '平面设计',
						'desc' => '我们平面设计包括宣传单，海报，折页，画册，布条，挂条，平面广告，招牌，广告牌，书刊等。',
					),
				),
			),
			array(
				'pri_color_code' => '#8F53A1',
				'translation' => array(
					'cn' => array(
						'name' => '平面摄影',
						'desc' => '我们能为客户的产品，代言人和活动安排摄影。',
					),
				),
			),
			array(
				'pri_color_code' => '#eee80a',
				'translation' => array(
					'cn' => array(
						'name' => '文案撰写',
						'desc' => '我们能为可撰写活动流程，产品特性，品牌故事，新闻稿等等，也涵盖国语，英语与华语的翻译。',
					),
				),
			),
			array(
				'pri_color_code' => '#1f9ea0',
				'translation' => array(
					'cn' => array(
						'name' => '打印服务',
						'desc' => '我们提供印刷服务，包括平面印刷，立体制作，布景制作，制服制作等。',
					),
				),
			),
		);

		$count = 0;

		foreach ($solutions as $solution)
		{
			// Reset to reuse image
			if ($lastFileId == 8)
			{
				$lastFileId = 0;
			}

			$sol = New Solution;
			$sol->grid_img_id    = ++$lastFileId;
			$sol->grid_bg_img_id = $bgImgId;
			$sol->pri_color_code = $solution['pri_color_code'];
 			$sol->sort_order     = $count++;
			$sol->save();

			foreach ($solution['translation'] as $key => $val)
			{
				$locale = Locale::where('language', '=', $key)->first();

				$solTranslation = new SolutionTranslation;
				$solTranslation->solution_id = $sol->id;
				$solTranslation->locale_id   = $locale->id;
				$solTranslation->name        = $val['name'];
				$solTranslation->desc 		 = $val['desc'];
				$solTranslation->save();
			}
		}
	}

}