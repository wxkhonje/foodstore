<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id')->default(0);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');              
            $table->String('name');
            $table->string('description');
            $table->string('image_path');
            $table->String('category');
            $table->string('contactperson');
            $table->string('email');
            $table->string('cellnumber');
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
        Schema::dropIfExists('businesses');
    }
};
