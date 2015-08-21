<?php

use Illuminate\Database\Seeder;
use App\Models\AttributeValue;

class SolutionTableSeeder extends Seeder 
{
	public function run()
	{
		$values = array(
			// Solutions - Name
			array(
				'attribute_id'       => '1',
				'entity_instance_id' => '10',
				'locale_id'          => '1',
				'value'              => '品牌形象策划',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '1',
				'entity_instance_id' => '11',
				'locale_id'          => '1',
				'value'              => '广告方案策划',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '1',
				'entity_instance_id' => '12',
				'locale_id'          => '1',
				'value'              => '广播广告策划',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '1',
				'entity_instance_id' => '13',
				'locale_id'          => '1',
				'value'              => '包装设计',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '1',
				'entity_instance_id' => '14',
				'locale_id'          => '1',
				'value'              => '数码设计',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '1',
				'entity_instance_id' => '15',
				'locale_id'          => '1',
				'value'              => '平面设计',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '1',
				'entity_instance_id' => '16',
				'locale_id'          => '1',
				'value'              => '平面摄影',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '1',
				'entity_instance_id' => '17',
				'locale_id'          => '1',
				'value'              => '文案撰写',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '1',
				'entity_instance_id' => '18',
				'locale_id'          => '1',
				'value'              => '打印服务',
				'status'             => '2'
			),
			// Solutions - Description
			array(
				'attribute_id'       => '2',
				'entity_instance_id' => '10',
				'locale_id'          => '1',
				'value'              => '从标志，采色，构图，字形到标语，我们的责任就是为客户塑造显著的品牌视觉形象。',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '2',
				'entity_instance_id' => '11',
				'locale_id'          => '1',
				'value'              => '我们能按照客户需求与预算安排广告策划，包括平面媒体，户外媒体，广播媒体和网络媒体。',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '2',
				'entity_instance_id' => '12',
				'locale_id'          => '1',
				'value'              => '包办广播电台广告与电视广告的脚本撰写，演员道具准备以及拍摄录制。',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '2',
				'entity_instance_id' => '13',
				'locale_id'          => '1',
				'value'              => '我们为客户设计产品包装，无论是盒装或是标签设计都在服务范畴。',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '2',
				'entity_instance_id' => '14',
				'locale_id'          => '1',
				'value'              => '泛指数码媒体上的设计，含括网页，手机应用程序网络宣传主图，以及动态图设计。',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '2',
				'entity_instance_id' => '15',
				'locale_id'          => '1',
				'value'              => '我们平面设计包括宣传单，海报，折页，画册，布条，挂条，平面广告，招牌，广告牌，书刊等。',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '2',
				'entity_instance_id' => '16',
				'locale_id'          => '1',
				'value'              => '我们能为客户的产品，代言人和活动安排摄影。',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '2',
				'entity_instance_id' => '17',
				'locale_id'          => '1',
				'value'              => '0',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '2',
				'entity_instance_id' => '18',
				'locale_id'          => '1',
				'value'              => '1',
				'status'             => '2'
			),
			// Solutions - Sort Order
			array(
				'attribute_id'       => '4',
				'entity_instance_id' => '10',
				'locale_id'          => '1',
				'value'              => '0',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '4',
				'entity_instance_id' => '11',
				'locale_id'          => '1',
				'value'              => '1',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '4',
				'entity_instance_id' => '12',
				'locale_id'          => '1',
				'value'              => '2',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '4',
				'entity_instance_id' => '13',
				'locale_id'          => '1',
				'value'              => '3',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '4',
				'entity_instance_id' => '14',
				'locale_id'          => '1',
				'value'              => '4',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '4',
				'entity_instance_id' => '15',
				'locale_id'          => '1',
				'value'              => '5',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '4',
				'entity_instance_id' => '16',
				'locale_id'          => '1',
				'value'              => '6',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '4',
				'entity_instance_id' => '17',
				'locale_id'          => '1',
				'value'              => '7',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '4',
				'entity_instance_id' => '18',
				'locale_id'          => '1',
				'value'              => '8',
				'status'             => '2'
			),
			// Solutions - Image ID
			array(
				'attribute_id'       => '6',
				'entity_instance_id' => '10',
				'value'              => '5',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '6',
				'entity_instance_id' => '11',
				'value'              => '6',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '6',
				'entity_instance_id' => '12',
				'value'              => '7',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '6',
				'entity_instance_id' => '13',
				'value'              => '8',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '6',
				'entity_instance_id' => '14',
				'value'              => '9',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '6',
				'entity_instance_id' => '15',
				'value'              => '10',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '6',
				'entity_instance_id' => '16',
				'value'              => '11',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '6',
				'entity_instance_id' => '17',
				'value'              => '12',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '6',
				'entity_instance_id' => '18',
				'value'              => '13',
				'status'             => '2'
			),
			// Solutions - Background Image ID
			array(
				'attribute_id'       => '7',
				'entity_instance_id' => '10',
				'value'              => '14',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '7',
				'entity_instance_id' => '11',
				'value'              => '14',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '7',
				'entity_instance_id' => '12',
				'value'              => '14',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '7',
				'entity_instance_id' => '13',
				'value'              => '14',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '7',
				'entity_instance_id' => '14',
				'value'              => '14',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '7',
				'entity_instance_id' => '15',
				'value'              => '14',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '7',
				'entity_instance_id' => '16',
				'value'              => '14',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '7',
				'entity_instance_id' => '17',
				'value'              => '14',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '7',
				'entity_instance_id' => '18',
				'value'              => '14',
				'status'             => '2'
			),
			// Solutions - Background Color Code
			array(
				'attribute_id'       => '5',
				'entity_instance_id' => '10',
				'value'              => '#eee80a',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '5',
				'entity_instance_id' => '11',
				'value'              => '#1f9ea0',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '5',
				'entity_instance_id' => '12',
				'value'              => '#c63f48',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '5',
				'entity_instance_id' => '13',
				'value'              => '#F7941E',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '5',
				'entity_instance_id' => '14',
				'value'              => '#45B97C',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '5',
				'entity_instance_id' => '15',
				'value'              => '#8F53A1',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '5',
				'entity_instance_id' => '16',
				'value'              => '#8F53A1',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '5',
				'entity_instance_id' => '17',
				'value'              => '#eee80a',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '5',
				'entity_instance_id' => '18',
				'value'              => '#1f9ea0',
				'status'             => '2'
			),
		);

		foreach ($values as $value)
		{
			AttributeValue::create($value);
		}
	}

}