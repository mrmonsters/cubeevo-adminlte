<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntityChildrenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::dropIfExists('entity_children');

		Schema::create('entity_children', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('parent_id')
				->unsigned();
			$table->foreign('parent_id')
				->references('id')
				->on('entity_instances');
			$table->integer('child_id')
				->unsigned();
			$table->foreign('child_id')
				->references('id')
				->on('entity_instances');
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
		Schema::drop('entity_children');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
