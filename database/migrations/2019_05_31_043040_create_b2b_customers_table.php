<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateB2bCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b2b_customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('b2bCustomer_name');
            $table->string('b2bCustomer_tag_line')->nullable();
            $table->string('b2bCustomer_code');
            $table->string('b2bCustomer_address');
            $table->string('b2bCustomer_website')->nullable();
            $table->string('b2bCustomer_contact_person')->nullable();
            $table->string('b2bCustomer_position')->nullable();
            $table->string('b2bCustomer_phone')->nullable();
            $table->string('b2bCustomer_mobile');
            $table->string('b2bCustomer_email')->nullable();
            $table->string('b2bCustomer_title')->nullable();
            $table->string('b2bCustomer_is_company');
            $table->string('b2bCustomer_status');
            $table->string('b2bCustomer_logo')->nullable();
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
        Schema::dropIfExists('b2b_customers');
    }
}
