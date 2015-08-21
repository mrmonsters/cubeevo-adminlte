<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageContentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('page_contents');

		Schema::create('page_contents', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('page_id')
				->unsigned();
			$table->foreign('page_id')
				->references('id')
				->on('pages');
			$table->string('title');
			$table->string('desc');
			$table->text('content');
			$table->integer('locale_id')
				->unsigned();
			$table->foreign('locale_id')
				->references('id')
				->on('locales');
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
		Schema::drop('page_contents');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
