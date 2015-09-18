<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProjectBlocksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('project_blocks', function(Blueprint $table)
		{
			$table->integer('thumbnail_id')->unsigned(true)->nullable(true);
			$table->foreign('thumbnail_id')->references('id')->on('files');
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
		Schema::table('project_blocks', function(Blueprint $table)
		{
			//DB::statement('SET FOREIGN_KEY_CHECKS = 0');
			//$table->dropColumn('thumbnail_id');
			//DB::statement('SET FOREIGN_KEY_CHECKS = 1');
		});
	}

}
