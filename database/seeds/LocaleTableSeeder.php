<?php

use Illuminate\Database\Seeder;
use App\Models\Locale;

class LocaleTableSeeder extends Seeder 
{
	public function run()
	{
		DB::table('locales')->delete();

		$locales = array('cn', 'en');

		foreach ($locales as $locale)
		{
			Locale::create(['language' => $locale]);
		}
	}

}