<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoinvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poinvoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('b2b_purchase_id')->default(0);
            $table->integer('b2bcustomer_id')->default(0);
            $table->string('poinvoice_company_logo')->nullable();
            $table->string('poinvoice_code')->nullable();
            $table->string('poinvoice_company_name')->nullable();
            $table->string('poinvoice_company_email')->nullable();
            $table->string('poinvoice_company_mobile')->nullable();
            $table->string('poinvoice_company_code')->nullable();
            $table->text('poinvoice_company_address')->nullable();
            $table->string('poinvoice_date')->nullable();
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
        Schema::dropIfExists('poinvoices');
    }
}
