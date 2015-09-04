<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolutionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::dropIfExists('solutions');

		Schema::create('solutions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('grid_img_id')->unsigned(true);
			$table->foreign('grid_img_id')->references('id')->on('files');
			$table->integer('grid_bg_img_id')->unsigned(true);
			$table->foreign('grid_bg_img_id')->references('id')->on('files');
			$table->string('pri_color_code');
			$table->integer('sort_order')->default(0);
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
		Schema::drop('solutions');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
