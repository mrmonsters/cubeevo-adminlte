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
		
		$this->call('UserTableSeeder');
		$this->call('LocaleTableSeeder');
		$this->call('PageTableSeeder');
		$this->call('CategoryTableSeeder');
		$this->call('ProjectTableSeeder');
		$this->call('SolutionTableSeeder');
		$this->call('SettingTableSeeder');
		$this->call('SettingTableSeeder_2016_06_22');
	}

}
