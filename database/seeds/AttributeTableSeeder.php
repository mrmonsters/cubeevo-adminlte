<?php

use Illuminate\Database\Seeder;
use App\Models\Attribute;

class AttributeTableSeeder extends Seeder 
{
	public function run()
	{
		DB::table('attributes')->delete();

		$attributes = array(
			array(
				'name'       => 'Name',
				'code'       => 'name',
				'type'       => 'text',
				'sort_order' => '1',
				'status'     => '2'
			),
			array(
				'name'       => 'Description',
				'code'       => 'desc',
				'type'       => 'text',
				'sort_order' => '2',
				'status'     => '2'
			),
			array(
				'name'       => 'Page Slug',
				'code'       => 'slug',
				'type'       => 'text',
				'sort_order' => '3',
				'status'     => '2'
			),
			array(
				'name'       => 'Sorting Order',
				'code'       => 'sort_order',
				'type'       => 'digit',
				'sort_order' => '5',
				'status'     => '2'
			),
			array(
				'name'       => 'Background Color',
				'code'       => 'bg_color_code',
				'type'       => 'text',
				'sort_order' => '6',
				'status'     => '2'
			),
			array(
				'name'       => 'Image',
				'code'       => 'img_id',
				'type'       => 'digit',
				'sort_order' => '7',
				'status'     => '2'
			),
			array(
				'name'       => 'Background Image',
				'code'       => 'bg_img_id',
				'type'       => 'digit',
				'sort_order' => '8',
				'status'     => '2'
			),
		);

		foreach ($attributes as $attribute)
		{
			Attribute::create($attribute);
		}
	}

}