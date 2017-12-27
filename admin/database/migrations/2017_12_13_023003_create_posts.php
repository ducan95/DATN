<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id_post');
            $table->integer('id_release_number')->unique();
            $table->string('title');
            $table->string('slug');
            $table->integer('status')->unsigned();
            $table->string('thumbnail')->nullable();
            $table->string('thumbnail_path')->nullable();
            $table->dateTime('time_begin');
            $table->dateTime('time_end');
            $table->integer('status_preview_top')->unsigned();
            $table->dateTime('deleted_at')->notnull();
            $table->boolean('is_deleted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
           
