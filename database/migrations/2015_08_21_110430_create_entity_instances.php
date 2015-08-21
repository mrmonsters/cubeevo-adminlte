<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntityInstances extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::dropIfExists('entity_instances');

		Schema::create('entity_instances', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('entity_id')
				->unsigned();
			$table->foreign('entity_id')
				->references('id')
				->on('entities');
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
		Schema::drop('entity_instances');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
