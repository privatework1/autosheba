<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vendor_name');
            $table->string('vendor_tag_line')->nullable();
            $table->string('vendor_password')->nullable();
            $table->string('vendor_address');
            $table->string('vendor_website')->nullable();
            $table->string('vendor_authorized_person_name');
            $table->string('vendor_contact_reference')->nullable();
            $table->string('vendor_phone')->nullable();
            $table->string('vendor_mobile');
            $table->string('vendor_fax')->nullable();
            $table->string('vendor_email')->nullable();
            $table->string('vendor_title')->nullable();
            $table->string('vendor_is_company');
            $table->string('vendor_is_customer');
            $table->string('vendor_is_supplier');
            $table->string('vendor_is_approved_vendor');
            $table->string('vendor_status');
            $table->string('vendor_logo');
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
        Schema::dropIfExists('vendors');
    }
}
