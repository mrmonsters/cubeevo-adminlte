<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageSectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('page_sections');

		Schema::create('page_sections', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('page_id')
				->unsigned();
			$table->foreign('page_id')
				->references('page_id')
				->on('pages');
			$table->integer('section_id')
				->references('section_id')
				->on('sections');
			$table->timestamps('created_at');
			$table->integer('status')
				->default(0);
			$table->boolean('deleted')
				->default(false);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		Schema::drop('page_sections');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
