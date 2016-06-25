<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileBlockTranslationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::dropIfExists('profile_block_translations');

		Schema::create('profile_block_translations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('profile_block_id')->unsigned(true);
			$table->foreign('profile_block_id')->references('id')->on('profile_blocks');
			$table->integer('locale_id')->unsigned(true);
			$table->foreign('locale_id')->references('id')->on('locales');
			$table->string('title');
			$table->text('desc');
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
		Schema::drop('profile_block_translations');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
