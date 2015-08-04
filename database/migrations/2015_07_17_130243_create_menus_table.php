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
			$table->increments('menu_id');
			$table->string('menu_name');
			$table->string('menu_desc');
			$table->integer('parent_menu_id')
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
		Schema::drop('menus');
	}

}
