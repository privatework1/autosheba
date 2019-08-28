<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payment_type')->nullable();
            $table->text('bank_info')->nullable();
            $table->text('card_info')->nullable();
            $table->string('bkash_number')->nullable();
            $table->text('bkash_transaction_number')->nullable();
            $table->string('bank_api')->nullable();
            $table->string('card_api')->nullable();
            $table->string('bkash_api')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
