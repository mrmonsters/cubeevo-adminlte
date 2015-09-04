<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTranslationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::dropIfExists('category_translations');

		Schema::create('category_translations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('category_id')->unsigned(true);
			$table->foreign('category_id')->references('id')->on('categories');
			$table->integer('locale_id')->unsigned(true);
			$table->foreign('locale_id')->references('id')->on('locales');
			$table->string('name');
			$table->string('desc');
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
		Schema::drop('category_translations');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
