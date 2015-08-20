<?php

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageTableSeeder extends Seeder 
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
				'status'  => '2'
			),
			// About Us
			array(
				'title'   => 'About Us',
				'desc'    => 'About us page.',
				'slug'    => '/about-us',
				'status'  => '2'
			),
			// Process
			array(
				'title'   => 'Process',
				'desc'    => 'Process page.',
				'slug'    => '/process',
				'status'  => '2'
			),
		);

		foreach ($pages as $page)
		{
			Page::create($page);
		}
	}

}