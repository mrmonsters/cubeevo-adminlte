<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::dropIfExists('categories');

		Schema::create('categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('grid_img_id')->unsigned(true);
			$table->foreign('grid_img_id')->references('id')->on('files');
			$table->integer('grid_bg_img_id')->unsigned(true);
			$table->foreign('grid_bg_img_id')->references('id')->on('files');
			$table->string('slug')->unique();
			$table->integer('sort_order');
			$table->integer('status')->default(2);
			$table->integer('delete')->default(0);
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
		Schema::drop('categories');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
