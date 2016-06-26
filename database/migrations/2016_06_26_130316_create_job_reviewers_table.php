<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobReviewersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('job_reviewers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('qualification');
			$table->integer('type');
			$table->date('date');
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
		Schema::table('job_reviewers', function(Blueprint $table)
		{
			$table->drop();
		});
	}

}
