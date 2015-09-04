<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolutionTranslationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::dropIfExists('solution_translations');

		Schema::create('solution_translations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('solution_id')->unsigned(true);
			$table->foreign('solution_id')->references('id')->on('projects');
			$table->integer('locale_id')->unsigned(true);
			$table->foreign('locale_id')->references('id')->on('locales');
			$table->string('name');
			$table->string('desc');
			$table->integer('sort_order');
			$table->integer('status')->default(2);
			$table->boolean('delete')->default(0);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		Schema::drop('solution_translations');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
