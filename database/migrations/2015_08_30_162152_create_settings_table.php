<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::dropIfExists('settings');

		Schema::create('settings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('code')->unique();
			$table->string('type');
			$table->string('value');
			$table->integer('status')->default(2);
			$table->timestamps();
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
		Schema::drop('settings');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
