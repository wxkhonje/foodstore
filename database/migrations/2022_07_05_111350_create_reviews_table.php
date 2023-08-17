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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id')->unsigned();            
            $table->unsignedBigInteger('customer_id')->unsigned();            
            $table->string('product_name');
            $table->text('product_description');
            $table->string('product_image');
            $table->decimal('rating_value', 3, 1);
            $table->decimal('rating_best', 3, 1);
            $table->decimal('rating_worst', 3, 1);
            $table->string('author_name');
            $table->date('date_published');
            $table->text('review_body');
            $table->timestamps();
            $table->foreign('menu_id')
            ->references('id')
            ->on('menus')
            ->onDelete('cascade');
            $table->foreign('customer_id')
            ->references('id')
            ->on('customers')
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
        Schema::dropIfExists('reviews');
    }
};
