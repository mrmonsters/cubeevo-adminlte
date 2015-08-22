<?php

use Illuminate\Database\Seeder;
use App\Models\AttributeValue;

class CategoryTableSeeder extends Seeder 
{
	public function run()
	{
		$values = array(
			// Categories - Name
			array(
				'attribute_id'       => '1',
				'entity_instance_id' => '1',
				'locale_id'          => '1',
				'value'              => '型在零售业',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '1',
				'entity_instance_id' => '2',
				'locale_id'          => '1',
				'value'              => '型在餐饮业',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '1',
				'entity_instance_id' => '3',
				'locale_id'          => '1',
				'value'              => '型在美容业',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '1',
				'entity_instance_id' => '4',
				'locale_id'          => '1',
				'value'              => '型在电子业',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '1',
				'entity_instance_id' => '5',
				'locale_id'          => '1',
				'value'              => '型在金融业',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '1',
				'entity_instance_id' => '6',
				'locale_id'          => '1',
				'value'              => '型在教学业',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '1',
				'entity_instance_id' => '7',
				'locale_id'          => '1',
				'value'              => '型在房产业',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '1',
				'entity_instance_id' => '8',
				'locale_id'          => '1',
				'value'              => '型在汽车业',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '1',
				'entity_instance_id' => '9',
				'locale_id'          => '1',
				'value'              => '敬请期待',
				'status'             => '2'
			),
			// Categories - Sort Order
			array(
				'attribute_id'       => '4',
				'entity_instance_id' => '1',
				'value'              => '0',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '4',
				'entity_instance_id' => '2',
				'value'              => '1',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '4',
				'entity_instance_id' => '3',
				'value'              => '2',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '4',
				'entity_instance_id' => '4',
				'value'              => '3',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '4',
				'entity_instance_id' => '5',
				'value'              => '4',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '4',
				'entity_instance_id' => '6',
				'value'              => '5',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '4',
				'entity_instance_id' => '7',
				'value'              => '6',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '4',
				'entity_instance_id' => '8',
				'value'              => '7',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '4',
				'entity_instance_id' => '9',
				'value'              => '8',
				'status'             => '2'
			),
			// Categories - Image ID
			array(
				'attribute_id'       => '6',
				'entity_instance_id' => '1',
				'value'              => '1',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '6',
				'entity_instance_id' => '2',
				'value'              => '2',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '6',
				'entity_instance_id' => '3',
				'value'              => '3',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '6',
				'entity_instance_id' => '4',
				'value'              => '3',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '6',
				'entity_instance_id' => '5',
				'value'              => '4',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '6',
				'entity_instance_id' => '6',
				'value'              => '1',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '6',
				'entity_instance_id' => '7',
				'value'              => '4',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '6',
				'entity_instance_id' => '8',
				'value'              => '3',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '6',
				'entity_instance_id' => '9',
				'value'              => '',
				'status'             => '2'
			),
			// Categories - Background Image ID
			array(
				'attribute_id'       => '7',
				'entity_instance_id' => '1',
				'value'              => '15',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '7',
				'entity_instance_id' => '2',
				'value'              => '16',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '7',
				'entity_instance_id' => '3',
				'value'              => '17',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '7',
				'entity_instance_id' => '4',
				'value'              => '17',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '7',
				'entity_instance_id' => '5',
				'value'              => '18',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '7',
				'entity_instance_id' => '6',
				'value'              => '15',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '7',
				'entity_instance_id' => '7',
				'value'              => '18',
				'status'             => '2'
			),
			array(
				'attribute_id'       => '7',
				'entity_instance_id' => '8',
				'value'              => '17',
				'status'             => '2'
			),
		);

		foreach ($values as $value)
		{
			AttributeValue::create($value);
		}
	}

}