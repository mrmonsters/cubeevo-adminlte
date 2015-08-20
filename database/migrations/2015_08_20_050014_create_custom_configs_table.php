<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomConfigsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('custom_configs');

		Schema::create('custom_configs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('desc');
			$table->string('value');
			$table->string('type');
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
		Schema::drop('custom_configs');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
