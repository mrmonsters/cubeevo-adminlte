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
				'name'       => 'Branding',
				'code'       => 'brand',
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
				'name'       => 'Primary Background Color',
				'code'       => 'pri_bg_color_code',
				'type'       => 'text',
				'sort_order' => '6',
				'status'     => '2'
			),
			array(
				'name'       => 'Secondary Background Color',
				'code'       => 'sec_bg_color_code',
				'type'       => 'text',
				'sort_order' => '7',
				'status'     => '2'
			),
			array(
				'name'       => 'Grid Image',
				'code'       => 'grid_img_id',
				'type'       => 'digit',
				'sort_order' => '8',
				'status'     => '2'
			),
			array(
				'name'       => 'Background Image',
				'code'       => 'grid_bg_img_id',
				'type'       => 'digit',
				'sort_order' => '9',
				'status'     => '2'
			),
			array(
				'name'       => 'Images',
				'code'       => 'img_ids',
				'type'       => 'text',
				'sort_order' => '10',
				'status'     => '2'
			),
			array(
				'name'       => 'Year',
				'code'       => 'year',
				'type'       => 'text',
				'sort_order' => '11',
				'status'     => '2'
			),
			array(
				'name'       => 'Founder',
				'code'       => 'founder',
				'type'       => 'text',
				'sort_order' => '12',
				'status'     => '2'
			),
			array(
				'name'       => 'Cover Image',
				'code'       => 'cover_img_id',
				'type'       => 'text',
				'sort_order' => '13',
				'status'     => '2'
			),
			array(
				'name'       => 'Text Color Code',
				'code'       => 'txt_color_code',
				'type'       => 'text',
				'sort_order' => '14',
				'status'     => '2'
			),
		);

		foreach ($attributes as $attribute)
		{
			Attribute::create($attribute);
		}
	}

}