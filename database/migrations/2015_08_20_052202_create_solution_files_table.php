<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolutionFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('solution_files');

		Schema::create('solution_files', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('solution_id')
				->unsigned();
			$table->foreign('solution_id')
				->references('id')
				->on('solutions');
			$table->integer('file_id')
				->unsigned();
			$table->foreign('file_id')
				->references('id')
				->on('files');
			$table->timestamps('created_at');
			$table->integer('status')
				->default(0);
			$table->boolean('deleted')
				->default(false);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		Schema::drop('solution_files');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
