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
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
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
       
    }
}
