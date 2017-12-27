<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id_image');
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->string('path');
            $table->string('path_blur');
            $table->boolean('is_deleted');
            $table->timestamps();
        });

        Schema::create('post_image', function (Blueprint $table) {
            $table->increments('id_post_image');
            $table->integer('id_image');
            $table->integer('id_post');
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
        Schema::dropIfExists('images');
        Schema::dropIfExists('post_image');
    }
}
