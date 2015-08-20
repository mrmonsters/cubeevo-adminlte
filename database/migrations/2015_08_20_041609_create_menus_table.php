<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('menus');

		Schema::create('menus', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('desc');
			$table->integer('parent_id')
				->nullable();
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
		Schema::drop('menus');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
