<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileBlocksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::dropIfExists('profile_blocks');

		Schema::create('profile_blocks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('img_dir')->nullable(true);
			$table->integer('sort_order')->default(0);
			$table->integer('status')->default(2);
			$table->boolean('delete')->default(0);
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
		Schema::drop('profile_blocks');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
