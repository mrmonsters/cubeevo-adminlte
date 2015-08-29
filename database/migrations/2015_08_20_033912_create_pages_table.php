<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('pages');

		Schema::create('pages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('slug')->unique();
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
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		Schema::drop('pages');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
