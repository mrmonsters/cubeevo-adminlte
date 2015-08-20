<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('page_menus');

		Schema::create('page_menus', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('page_id')
				->unsigned();
			$table->foreign('page_id')
				->references('id')
				->on('pages');
			$table->integer('menu_id')
				->unsigned();
			$table->foreign('menu_id')
				->references('id')
				->on('menus');
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
		Schema::drop('page_menus');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
