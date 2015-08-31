<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::dropIfExists('messages');

		Schema::create('messages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('subject');
			$table->string('name');
			$table->string('phone');
			$table->string('email');
			$table->string('content');
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
		Schema::drop('messages');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
