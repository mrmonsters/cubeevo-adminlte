<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::dropIfExists('entities');

		Schema::create('entities', function(Blueprint $table)
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
		Schema::drop('entities');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
