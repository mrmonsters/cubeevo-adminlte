<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobBlockTranslations extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::dropIfExists('job_block_translations');

		Schema::create('job_block_translations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('job_block_id')->unsigned(true);
			$table->foreign('job_block_id')->references('id')->on('job_blocks');
			$table->integer('locale_id')->unsigned(true);
			$table->foreign('locale_id')->references('id')->on('locales');
			$table->string('title');
			$table->text('desc');
			$table->text('qualification');
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
		Schema::drop('job_block_translations');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
