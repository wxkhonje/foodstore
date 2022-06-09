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
            $table->id();
            $table->String('name');
            $table->String('category');
            $table->String('location');
            $table->String('PhysicalAddress');
            $table->integer('longitude');
            $table->integer('latitude');
            $table->string('contactperson');
            $table->string('email');
            $table->string('cellnumber');
            $table->string('facebookhandle')->nullable();
            $table->string('instagramhandle')->nullable();
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
