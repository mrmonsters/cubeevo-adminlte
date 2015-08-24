<?php

use Illuminate\Database\Seeder;
use App\Models\EntityInstance;

class EntityInstanceTableSeeder extends Seeder 
{
	public function run()
	{
		DB::table('entity_instances')->delete();

		$instances = array(
			// Entity instances
			array(
				'entity_id' => '1',
				'status'    => '2'
			),
			array(
				'entity_id' => '1',
				'status'    => '2'
			),
			array(
				'entity_id' => '1',
				'status'    => '2'
			),
			array(
				'entity_id' => '1',
				'status'    => '2'
			),
			array(
				'entity_id' => '1',
				'status'    => '2'
			),
			array(
				'entity_id' => '1',
				'status'    => '2'
			),
			array(
				'entity_id' => '1',
				'status'    => '2'
			),
			array(
				'entity_id' => '1',
				'status'    => '2'
			),
			array(
				'entity_id' => '1',
				'status'    => '2'
			),
			// Solutions
			array(
				'entity_id' => '3',
				'status'    => '2'
			),
			array(
				'entity_id' => '3',
				'status'    => '2'
			),
			array(
				'entity_id' => '3',
				'status'    => '2'
			),
			array(
				'entity_id' => '3',
				'status'    => '2'
			),
			array(
				'entity_id' => '3',
				'status'    => '2'
			),
			array(
				'entity_id' => '3',
				'status'    => '2'
			),
			array(
				'entity_id' => '3',
				'status'    => '2'
			),
			array(
				'entity_id' => '3',
				'status'    => '2'
			),
			array(
				'entity_id' => '3',
				'status'    => '2'
			),
		);

		foreach ($instances as $instance)
		{
			EntityInstance::create($instance);
		}
	}

}