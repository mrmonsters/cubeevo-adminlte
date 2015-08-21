<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		
		$this->call('LocaleTableSeeder');
		$this->call('PageTableSeeder');
		$this->call('PageContentTableSeeder');
		$this->call('FileTableSeeder');
		$this->call('EntityTableSeeder');
		$this->call('EntityInstanceTableSeeder');
		$this->call('AttributeTableSeeder');
		$this->call('CategoryTableSeeder');
		$this->call('SolutionTableSeeder');
	}

}
