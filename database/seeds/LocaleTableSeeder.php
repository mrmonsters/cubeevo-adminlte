<?php

use Illuminate\Database\Seeder;
use App\Models\Locale;

class LocaleTableSeeder extends Seeder 
{
	public function run()
	{
		DB::table('locales')->delete();

		$locales = array(
			array(
				'name'   => 'Chinese',
				'code'   => 'cn',
				'status' => '2'
			),
			array(
				'name'   => 'English',
				'code'   => 'en',
				'status' => '2'
			),
		);

		foreach ($locales as $locale)
		{
			Locale::create($locale);
		}
	}

}