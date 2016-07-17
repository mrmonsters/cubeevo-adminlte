<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SettingTableSeeder_2016_06_22 extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$settings = array(
			array(
				'name'  => 'Twitter Link',
				'code'  => 'twitter_link',
				'type'  => \App\Models\Setting::USER,
				'value' => 'https://twitter.com/CUBEevoad',
			),
			array(
				'name'  => 'Google Plus Link',
				'code'  => 'google_plus_link',
				'type'  => \App\Models\Setting::USER,
				'value' => 'https://plus.google.com/+Cubeevo/',
			),
		);

		foreach ($settings as $setting) {

			\App\Models\Setting::create($setting);
		}
	}

}
