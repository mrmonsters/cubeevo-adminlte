<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('project_categories');

		Schema::create('project_categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('project_id')
				->unsigned();
			$table->foreign('project_id')
				->references('id')
				->on('projects');
			$table->integer('category_id')
				->unsigned();
			$table->foreign('category_id')
				->references('id')
				->on('categories');
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
		Schema::drop('project_categories');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
