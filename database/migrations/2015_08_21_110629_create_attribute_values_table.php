<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeValuesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::dropIfExists('attribute_values');

		Schema::create('attribute_values', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('attribute_id')
				->unsigned();
			$table->foreign('attribute_id')
				->references('id')
				->on('attributes');
			$table->integer('entity_instance_id')
				->unsigned();
			$table->foreign('entity_instance_id')
				->references('id')
				->on('entity_instances');
			$table->integer('locale_id')
				->unsigned()
				->nullable(true);
			$table->foreign('locale_id')
				->references('id')
				->on('locales');
			$table->string('value');
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
		Schema::drop('attribute_values');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
