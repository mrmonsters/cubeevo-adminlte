<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder 
{
	public function run()
	{
		DB::table('categories')->delete();

		$categories = array(
			array(
				'locale'	 => 'zh-cn',
				'name'       => '型在零售业',
				'sort_order' => '0',
				'file_id'	 => '1',
				'status'     => '2'
			),
			array(
				'locale'	 => 'zh-cn',
				'name'       => '型在餐饮业',
				'sort_order' => '1',
				'file_id'	 => '2',
				'status'     => '2'
			),
			array(
				'locale'	 => 'zh-cn',
				'name'       => '型在美容业',
				'sort_order' => '2',
				'file_id'	 => '3',
				'status'     => '2'
			),
			array(
				'locale'	 => 'zh-cn',
				'name'       => '型在电子业',
				'sort_order' => '3',
				'file_id'	 => '3',
				'status'     => '2'
			),
			array(
				'locale'	 => 'zh-cn',
				'name'       => '型在金融业',
				'sort_order' => '4',
				'file_id'	 => '4',
				'status'     => '2'
			),
			array(
				'locale'	 => 'zh-cn',
				'name'       => '型在教学业',
				'sort_order' => '5',
				'file_id'	 => '1',
				'status'     => '2'
			),
			array(
				'locale'	 => 'zh-cn',
				'name'       => '型在房产业',
				'sort_order' => '6',
				'file_id'	 => '4',
				'status'     => '2'
			),
			array(
				'locale'	 => 'zh-cn',
				'name'       => '型在汽车业',
				'sort_order' => '7',
				'file_id'	 => '3',
				'status'     => '2'
			),
			array(
				'locale'	 => 'zh-cn',
				'name'       => '敬请期待',
				'desc'       => '',
				'sort_order' => '8',
				'status'     => '2'
			),
		);

		foreach ($categories as $category)
		{
			Category::create($category);
		}
	}

}