<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTranslationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::dropIfExists('project_translations');

		Schema::create('project_translations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('project_id')->unsigned(true);
			$table->foreign('project_id')->references('id')->on('projects');
			$table->integer('locale_id')->unsigned(true);
			$table->foreign('locale_id')->references('id')->on('locales');
			$table->string('name');
			$table->string('client_name');
			$table->text('background');
			$table->text('challenge');
			$table->text('result');
			$table->string('sub_heading');
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
		Schema::drop('project_translations');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
