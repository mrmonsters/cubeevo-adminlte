<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::dropIfExists('projects');

		Schema::create('projects', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('category_id')->unsigned(true);
			$table->foreign('category_id')->references('id')->on('categories');
			$table->integer('grid_img_id')->unsigned(true);
			$table->foreign('grid_img_id')->references('id')->on('files');
			$table->integer('grid_bg_img_id')->unsigned(true);
			$table->foreign('grid_bg_img_id')->references('id')->on('files');
			$table->integer('brand_img_id')->unsigned(true);
			$table->foreign('brand_img_id')->references('id')->on('files');
			$table->string('pri_color_code');
			$table->string('sec_color_code');
			$table->string('txt_color_code');
			$table->string('year');
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
		Schema::drop('projects');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
