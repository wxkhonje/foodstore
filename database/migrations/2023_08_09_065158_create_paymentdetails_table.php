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
            Schema::create('paymentdetails', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('customer_id'); // Foreign key for the customer
                $table->string('payment_method');
                $table->string('card_number')->nullable();
                $table->string('expirydate')->nullable();
                $table->string('ussdMNO')->nullable(); // USSD mobile payment option
                $table->string('ussdmobilenumber')->nullable(); // USSD mobile payment option
                $table->string('delivery_address');
                $table->string('phone_number');
                $table->string('email');
                $table->timestamps();
    
                // Define the foreign key relationship
                $table->foreign('customer_id')
                    ->references('id')
                    ->on('customers')
                    ->onDelete('cascade'); // Delete payment details if the associated customer is deleted
            });
        }
    
        public function down()
        {
            Schema::dropIfExists('paymentdetails');
        }
};
