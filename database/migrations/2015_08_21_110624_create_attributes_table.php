<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::dropIfExists('attributes');

		Schema::create('attributes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')
				->nullable(false);
			$table->string('code')
				->nullable(false);
			$table->string('type')
				->default('text');
			$table->boolean('user_configurable')
				->default(1);
			$table->integer('sort_order')
				->default(0);
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
		Schema::drop('attributes');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
