<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::dropIfExists('locales');

		Schema::create('locales', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')
				->nullable(false);
			$table->string('code')
				->nullable(false);
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
		//
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		Schema::drop('locales');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
