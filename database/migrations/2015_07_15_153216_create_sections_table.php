<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('sections');

		Schema::create('sections', function(Blueprint $table)
		{
			$table->increments('section_id');
			$table->string('section_title');
			$table->string('section_desc');
			$table->text('section_content');
			$table->string('section_locale')
				->default('en_US');
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
		Schema::drop('sections');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
