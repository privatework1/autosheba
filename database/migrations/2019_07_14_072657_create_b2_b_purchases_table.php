<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateB2BPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b2_b_purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('b2bcustomer_id')->default(0);
            $table->string('b2bpurchase_code')->nullable();
            $table->string('b2bpurchase_date')->nullable();
            $table->string('po_company_logo')->nullable();
            $table->string('po_company_name')->nullable();
            $table->string('po_company_email')->nullable();
            $table->string('po_company_mobile')->nullable();
            $table->string('po_company_code')->nullable();
            $table->text('po_company_address')->nullable();
            $table->string('po_date')->nullable();
            $table->float('total_purchase')->default(0);
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
        Schema::dropIfExists('b2_b_purchases');
    }
}
