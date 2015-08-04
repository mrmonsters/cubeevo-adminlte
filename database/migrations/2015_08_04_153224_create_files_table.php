<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('files');

		Schema::create('files', function(Blueprint $table)
		{
			$table->increments('file_id');
			$table->string('file_name');
			$table->string('file_type');
			$table->string('file_dir');
			$table->integer('file_size');
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
		Schema::drop('files');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
