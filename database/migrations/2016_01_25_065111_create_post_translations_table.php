<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned(true);
            $table->foreign('post_id')->references('id')->on('posts');
            $table->integer('locale_id')->unsigned(true);
            $table->foreign('locale_id')->references('id')->on('locales');
            $table->text('title')->nullable(false);
            $table->text('description')->nullable();
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
        Schema::drop('post_translations');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
