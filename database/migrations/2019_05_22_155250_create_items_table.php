<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vendor_id')->default(0);
            $table->string('item_name');
            $table->integer('item_brand')->default(0);
            $table->integer('item_category');
            $table->integer('item_type')->nullable();
            $table->integer('item_subcategory')->nullable();
            $table->integer('item_supplier')->default(0);
            $table->string('cost_price');
            $table->string('sale_price');
            $table->string('tax_rate');
            $table->string('reorder_quantity');
            $table->mediumText('item_description')->nullable();
            $table->string('warrenty');
            $table->string('warrenty_type')->nullable();
            $table->timestamp('warrenty_end_date')->nullable();
            $table->mediumText('warrenty_details')->nullable();
            $table->string('color')->nullable();
            $table->string('part_of');
            $table->string('model_no');
            $table->string('item_size')->nullable();
            $table->text('item_feature')->nullable();
            $table->string('item_images')->nullable();
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
        Schema::dropIfExists('items');
    }
}
