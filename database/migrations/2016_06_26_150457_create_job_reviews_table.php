<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobReviewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('job_reviews', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('reviewer_id')->unsigned(true);
			$table->foreign('reviewer_id')->references('id')->on('job_reviewers');
			$table->text('question');
			$table->text('answer');
			$table->integer('locale')->default(0);
			$table->integer('sort')->default(0);
			$table->integer('status')->default(2);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('job_reviews');
	}

}
