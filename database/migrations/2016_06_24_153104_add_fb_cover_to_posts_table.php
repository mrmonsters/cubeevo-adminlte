<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFbCoverToPostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('posts', function(Blueprint $table)
		{
			$table->integer('fb_cover_img_id')->unsigned(true)->nullable();
			$table->foreign('fb_cover_img_id')->references('id')->on('files');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('posts', function(Blueprint $table)
		{
			DB::statement('SET FOREIGN_KEY_CHECKS = 0');
			$table->dropColumn('fb_cover_img_id');
			DB::statement('SET FOREIGN_KEY_CHECKS = 1');
		});
	}

}
