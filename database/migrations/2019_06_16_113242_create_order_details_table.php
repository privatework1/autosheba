<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id')->default(0);
            $table->integer('myvendor_id')->default(0);
            $table->string('item_name')->nullable();
            $table->integer('item_quantity')->default(0);
            $table->float('item_price')->default(0);
            $table->integer('order_id')->default(0);
            $table->integer('customer_id')->default(0);
            $table->integer('shipping_id')->default(0);
            $table->integer('payment_id')->default(0);
            
         
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
        Schema::dropIfExists('order_details');
    }
}
