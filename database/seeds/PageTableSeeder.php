<?php

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageTableSeeder extends DatabaseSeeder 
{
	public function run()
	{
		DB::table('pages')->delete();

		$pages = array(
			// Home
			array(
				'title'   => 'Home',
				'desc'    => 'Home page.',
				'slug'    => '/',
				'content' => '',
				'status'       => '2'
			),
		);

		foreach ($pages as $page)
		{
			Page::create($page);
		}
	}

}