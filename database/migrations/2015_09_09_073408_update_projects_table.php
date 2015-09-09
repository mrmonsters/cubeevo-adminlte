<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('projects', function(Blueprint $table)
		{
			$table->integer('grid_img_id')->unsigned(true)->nullable(true)->change();
			$table->integer('grid_bg_img_id')->unsigned(true)->nullable(true)->change();
			$table->integer('brand_img_id')->unsigned(true)->nullable(true)->change();
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
		Schema::table('projects', function(Blueprint $table)
		{
			$table->integer('grid_img_id')->unsigned(true)->change();
			$table->integer('grid_bg_img_id')->unsigned(true)->change();
			$table->integer('brand_img_id')->unsigned(true)->change();
		});
	}

}
