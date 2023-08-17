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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');         
            $table->integer('business_id')->unsigned();
            $table->string('order_number')->unique();
            $table->enum('status', ['Order Placed', 'Order Confirmed', 'Preparing', 'Prepared','Packaged','Out for Delivery', 'Delivered', 'Cancelled', 'Refunded', 'Delayed', 'Completed', 'Pending Customer Action'])->default('Order Placed');
            $table->decimal('total_amount', 8, 2);
            $table->text('delivery_address');
            $table->text('latitude')->nullable();
            $table->text('longitude')->nullable();
            $table->text('cartsession');
            $table->string('contact_phone');
            $table->dateTime('delivery_time');
            $table->text('note')->nullable();
            $table->timestamps();
            // Define foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');
        });

        // Generate unique order number for existing orders
        $this->generateOrderNumber();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }

    private function generateOrderNumber()
    {
        $orders = \App\Models\order::all();

        foreach ($orders as $order) {
            $order->order_number = $this->generateUniqueOrderNumber();
            $order->save();
        }
    }

    /**
     * Generate a unique order number.
     *
     * @return string
     */
    private function generateUniqueOrderNumber()
    {
        $prefix = 'ORD'; // You can set a custom prefix for the order number
        $timestamp = now()->format('YmdHis');
        $random = strtoupper(substr(md5(uniqid(rand(), true)), 0, 4));

        return $prefix . $timestamp . $random;
    }



};
