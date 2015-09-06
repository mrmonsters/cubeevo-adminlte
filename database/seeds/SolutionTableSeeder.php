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
   		DB::statement('SET FOREIGN_KEY_CHECKS=0');
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
						'desc' => '从标志，采色，构图，字形到标语，我们<br class="hidden-xs"/>的责任就是为客户塑造显著的品牌视觉形象。',
					),
					'en' => array(
						'name' => 'Branding Strategy',
						'desc' => 'From branding, choice of colours, compositions, typography, to slogan, we are equally vigilant and focused on creating the best Brand Image for you.',
					),
				),
			),
			array(
				'pri_color_code' => '#1f9ea0',
				'translation' => array(
					'cn' => array(
						'name' => '广告方案策划',
						'desc' => '我们能按照客户需求与预算安排广告策划，<br class="visible-xs"/>包括平面媒体，<br class="hidden-xs"/>户外媒体，广播媒体和网络媒体。',
					),
					'en' => array(
						'name' => 'Advertising Planning',
						'desc' => 'We are able to prepare an advertising plan in accordance to our clients\' needs and budget. This includes printed, outdoor, broadcasted, and web media advertising. ',
					),
				),
			),
			array(
				'pri_color_code' => '#c63f48',
				'translation' => array(
					'cn' => array(
						'name' => '广播广告策划',
						'desc' => '包办广播电台广告与电视广告的脚本撰写，<br/>演员道具准备以及拍摄录制。',
					),
					'en' => array(
						'name' => 'Broadcast Ad Planning',
						'desc' => 'This package involves script writing, preparations of props and talents, and production stages.',
					),
				),
			),
			array(
				'pri_color_code' => '#f7941e',
				'translation' => array(
					'cn' => array(
						'name' => '包装设计',
						'desc' => '我们为客户设计产品包装，<br/>无论是盒装或是标签设计都在服务范畴。',
					),
					'en' => array(
						'name' => 'Packaging Design',
						'desc' => 'We offer clients the benefit of having a wide range of packaging designs from box containers to product labels.',
					),
				),
			),
			array(
				'pri_color_code' => '#45B97C',
				'translation' => array(
					'cn' => array(
						'name' => '数码设计',
						'desc' => '泛指数码媒体上的设计，含括网页，<br class="hidden-xs"/>手机应用程序网络宣传主图，以及动态图设计。',
					),
					'en' => array(
						'name' => 'Digital Graphic Design',
						'desc' => 'Looking for something more dynamic? Well CubeEvo covers webpages, mobile apps, web posters, and even animated visuals designs.',
					),
				),
			),
			array(
				'pri_color_code' => '#8F53A1',
				'translation' => array(
					'cn' => array(
						'name' => '平面设计',
						'desc' => '我们平面设计包括宣传单，海报，折页，<br class="visible-xs"/>画册，布条，<br class="hidden-xs"/>挂条，平面广告，招牌，广告牌，书刊等。',
					),
					'en' => array(
						'name' => 'Graphic Design',
						'desc' => 'Our graphic design feild includes flyers, posters, brochures, catalogues, buntings, banners, print ads, signages , booklets, etc.',
					),
				),
			),
			array(
				'pri_color_code' => '#27BDBE',
				'translation' => array(
					'cn' => array(
						'name' => '平面摄影',
						'desc' => '我们能为客户的产品，<br/>代言人和活动安排摄影。',
					),
					'en' => array(
						'name' => 'Photography',
						'desc' => 'If you need product shooting, or talent shooting, or certain activities photographed, hey! We can help!',
					),
				),
			),
			array(
				'pri_color_code' => '#eee80a',
				'translation' => array(
					'cn' => array(
						'name' => '文案撰写',
						'desc' => '我们能为可撰写活动流程，产品特性，<br/>品牌故事，新闻稿等等，也涵盖国语，英语与华语的翻译。',
					),
					'en' => array(
						'name' => 'Copywriting',
						'desc' => 'We are capable of preparing program flows, product features, brand stories, press releases, etc. in multiple languages like Bahasa, English, and Mandarin.',
					),
				),
			),
			array(
				'pri_color_code' => '#f7941e',
				'translation' => array(
					'cn' => array(
						'name' => '打印服务',
						'desc' => '我们提供印刷服务，包括平面印刷，<br class="visible-xs"/>立体制作，<br class="hidden-xs"/>布景制作，制服制作等。',
					),
					'en' => array(
						'name' => 'Printing & Production',
						'desc' => 'We offer printing services, 3D modelings, backdrop productions, uniform designs and much more.',
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
    	DB::statement('SET FOREIGN_KEY_CHECKS=1');
	}

}