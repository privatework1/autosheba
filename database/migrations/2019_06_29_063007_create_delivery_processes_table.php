<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_processes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->default(0);
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->text('address')->nullable();
            $table->string('process_date_time')->nullable();
            $table->string('complete_process_date')->nullable();
            $table->string('complete_process_time')->nullable();
            $table->string('process_day')->nullable();
            $table->integer('process_status')->default(0);
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
        Schema::dropIfExists('delivery_processes');
    }
}
