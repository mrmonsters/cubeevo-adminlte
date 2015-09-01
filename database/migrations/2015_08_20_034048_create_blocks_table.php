<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlocksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('blocks');

		Schema::create('blocks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('project_id')->unsigned(true);
			$table->foreign('project_id')->references('id')->on('projects');
			$table->string('type');
			$table->string('value');
			$table->integer('sort_order');
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
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		Schema::drop('blocks');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
