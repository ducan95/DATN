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
            $table->integer('id_release_number');
            $table->integer('id_user');
            $table->string('title');
            $table->string('password');
            $table->string('slug');
            $table->longText('content');
            $table->integer('status')->unsigned();
            $table->string('thumbnail_path')->nullable();
            $table->dateTime('time_begin');
            $table->dateTime('time_end');
            $table->integer('status_preview_top')->unsigned();
            $table->dateTime('deleted_at')->nullable();
            $table->boolean('is_deleted');
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
        Schema::dropIfExists('posts');
    }
}
           
