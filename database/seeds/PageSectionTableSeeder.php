<?php

use Illuminate\Database\Seeder;
use App\PageSection;

class PageSectionTableSeeder extends Seeder 
{
	public function run()
	{
		DB::table('page_sections')->delete();

		$pageSections = array(
			// Home page sections
			array(
				'page_id'    => '1',
				'section_id' => '1',
				'status'     => '2'
			),
			array(
				'page_id'    => '1',
				'section_id' => '2',
				'status'     => '2'
			),
			array(
				'page_id'    => '1',
				'section_id' => '3',
				'status'     => '2'
			),
			array(
				'page_id'    => '1',
				'section_id' => '4',
				'status'     => '2'
			),
			array(
				'page_id'    => '1',
				'section_id' => '5',
				'status'     => '2'
			),
			array(
				'page_id'    => '1',
				'section_id' => '6',
				'status'     => '2'
			),
			array(
				'page_id'    => '1',
				'section_id' => '7',
				'status'     => '2'
			),
			// Credential page sections
			array(
				'page_id'    => '3',
				'section_id' => '8',
				'status'     => '2'
			),
			array(
				'page_id'    => '3',
				'section_id' => '9',
				'status'     => '2'
			),
			array(
				'page_id'    => '3',
				'section_id' => '10',
				'status'     => '2'
			),
			array(
				'page_id'    => '3',
				'section_id' => '11',
				'status'     => '2'
			),
			array(
				'page_id'    => '3',
				'section_id' => '12',
				'status'     => '2'
			),
			array(
				'page_id'    => '3',
				'section_id' => '13',
				'status'     => '2'
			),
			array(
				'page_id'    => '3',
				'section_id' => '14',
				'status'     => '2'
			),
			array(
				'page_id'    => '3',
				'section_id' => '15',
				'status'     => '2'
			),
			array(
				'page_id'    => '3',
				'section_id' => '16',
				'status'     => '2'
			),
			// Solution page sections
			array(
				'page_id'    => '4',
				'section_id' => '17',
				'status'     => '2'
			),
			array(
				'page_id'    => '4',
				'section_id' => '18',
				'status'     => '2'
			),
			array(
				'page_id'    => '4',
				'section_id' => '19',
				'status'     => '2'
			),
			array(
				'page_id'    => '4',
				'section_id' => '20',
				'status'     => '2'
			),
			array(
				'page_id'    => '4',
				'section_id' => '21',
				'status'     => '2'
			),
			array(
				'page_id'    => '4',
				'section_id' => '22',
				'status'     => '2'
			),
			array(
				'page_id'    => '4',
				'section_id' => '23',
				'status'     => '2'
			),
			array(
				'page_id'    => '4',
				'section_id' => '24',
				'status'     => '2'
			),
			array(
				'page_id'    => '4',
				'section_id' => '25',
				'status'     => '2'
			),
		);

		foreach ($pageSections as $pageSection)
		{
			PageSection::create($pageSection);
		}
	}
}