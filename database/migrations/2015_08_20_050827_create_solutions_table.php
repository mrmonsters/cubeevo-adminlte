<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolutionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('solutions');

		Schema::create('solutions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('desc');
			$table->integer('sort_order');
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
		Schema::drop('solutions');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
