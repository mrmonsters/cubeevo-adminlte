<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::dropIfExists('project_files');

		Schema::create('project_files', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('project_id')->unsigned(true);
			$table->foreign('project_id')->references('id')->on('projects');
			$table->integer('img_id')->unsigned(true);
			$table->foreign('img_id')->references('id')->on('files');
			$table->integer('sort_order');
			$table->integer('status')->default(2);
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
		Schema::drop('project_files');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
