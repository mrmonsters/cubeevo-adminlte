<?php

use Illuminate\Database\Seeder;
use App\Models\Entity;

class EntityTableSeeder extends Seeder 
{
	public function run()
	{
		DB::table('entities')->delete();

		$entities = array(
			array(
				'name'   => 'Category',
				'code'   => 'category',
				'status' => '2'
			),
			array(
				'name'   => 'Project',
				'code'   => 'project',
				'status' => '2'
			),
			array(
				'name'   => 'Solution',
				'code'   => 'solution',
				'status' => '2'
			),
		);

		foreach ($entities as $entity)
		{
			Entity::create($entity);
		}
	}

}