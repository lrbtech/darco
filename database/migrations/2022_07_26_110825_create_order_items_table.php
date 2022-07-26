<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('order_id',20)->nullable();
            $table->string('vendor_id',20)->nullable();
            $table->string('customer_id',20)->nullable();
            $table->string('shipping_address_id',20)->nullable();
            $table->string('billing_address_id',20)->nullable();
            $table->text('product_attributes')->nullable();
            $table->string('product_id',20)->nullable();
            $table->string('product_name')->nullable();
            $table->string('price',50)->nullable();
            $table->string('qty',20)->nullable();
            $table->string('total',50)->nullable();
            $table->string('return_policy',20)->nullable();
            $table->string('return_date',50)->nullable();
            $table->string('is_return',11)->default('0');
            $table->string('status',11)->default('0');
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
        Schema::dropIfExists('order_items');
    }
}
