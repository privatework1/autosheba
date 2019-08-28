<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vendor_id')->default(0);
            $table->string('order_code');
            $table->string('order_date')->nullable();
            $table->integer('customer_id');
            $table->integer('payment_id')->default(0);
            $table->float('order_total')->default(0);
            $table->string('payment_type')->nullable();
            $table->integer('order_status')->default(0);
            $table->integer('delivery_process')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
