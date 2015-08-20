<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('categories');

		Schema::create('categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('locale');
			$table->string('name');
			$table->string('desc');
			$table->integer('sort_order');
			$table->integer('file_id')
				->unsigned()
				->nullable(true);
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
		Schema::drop('categories');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
