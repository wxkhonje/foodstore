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
        Schema::create('businessaddresses', function (Blueprint $table) {
            $table->id();
            $table->integer('business_id')->unsigned();            
            $table->string('PostAddress');
            $table->string('PhysicalAddress');
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('region')->nullable();
            $table->string('district')->nullable();  
            $table->string('country')->nullable();
            $table->string('mainlanguage')->nullable();     
            $table->string('Street')->nullable();
            $table->string('googlepin')->nullable();
            $table->string('instagramhandle')->nullable();
            $table->string('facebookhandle')->nullable();
            $table->timestamps();
            $table->foreign('business_id')
            ->references('id')
            ->on('businesses')
            ->onDelete('cascade');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('businessaddresses');
    }
};
