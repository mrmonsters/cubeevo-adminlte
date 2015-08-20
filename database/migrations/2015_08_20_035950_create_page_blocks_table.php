<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageBlocksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('page_blocks');

		Schema::create('page_blocks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('page_id')
				->unsigned();
			$table->foreign('page_id')
				->references('id')
				->on('pages');
			$table->integer('block_id')
				->unsigned();
			$table->foreign('block_id')
				->references('id')
				->on('blocks');
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
		Schema::drop('page_blocks');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
