<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobReviewTranslationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('job_review_translations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('review_id')->unsigned(true);
			$table->foreign('review_id')->references('id')->on('job_reviews');
			$table->integer('locale_id')->unsigned(true);
			$table->foreign('locale_id')->references('id')->on('locales');
			$table->text('question');
			$table->text('answer');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('job_review_translations', function(Blueprint $table)
		{
			$table->drop();
		});
	}

}
