<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaticPagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('static_pages');

		Schema::create('static_pages', function(Blueprint $table)
		{
			$table->increments('page_id');
			$table->string('page_title');
			$table->string('page_desc');
			$table->text('page_content');
			$table->string('page_slug')
				->unique();
			$table->string('page_locale')
				->default('en_US');
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
		Schema::drop('static_pages');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
