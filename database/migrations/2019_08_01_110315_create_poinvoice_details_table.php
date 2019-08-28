<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoinvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poinvoice_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('b2bpurchaseinvoice_id')->default(0);
            $table->integer('item_id')->default(0);
            $table->integer('item_quantity')->default(0);
            $table->float('item_price')->default(0);
            $table->float('total_price')->default(0);
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
        Schema::dropIfExists('poinvoice_details');
    }
}
