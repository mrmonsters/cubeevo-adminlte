<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTranslationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::dropIfExists('page_translations');

		Schema::create('page_translations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('page_id')->unsigned();
			$table->foreign('page_id')->references('id')->on('pages');
			$table->integer('locale_id')->unsigned();
			$table->foreign('locale_id')->references('id')->on('locales');
			$table->string('desc');
			$table->text('content');
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
		Schema::drop('page_translations');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
