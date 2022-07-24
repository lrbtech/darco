<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('date')->nullable();
            $table->string('vendor_id',20)->nullable();
            $table->string('customer_id',20)->nullable();
            $table->string('shipping_address_id',20)->nullable();
            $table->string('billing_address_id',20)->nullable();
            $table->text('product_attributes')->nullable();
            $table->text('order_message')->nullable();
            $table->string('product_id',20)->nullable();
            $table->string('product_name')->nullable();
            $table->string('price',50)->nullable();
            $table->string('qty',20)->nullable();
            $table->string('sub_total',50)->nullable();
            $table->string('item_count',11)->nullable();
            $table->string('coupon_id',11)->nullable();
            $table->string('coupon_code',50)->nullable();
            $table->string('discount_percentage',20)->nullable();
            $table->string('discount_value',50)->nullable();
            $table->string('after_discount',50)->nullable();
            $table->string('tax_percentage',11)->nullable();
            $table->string('tax_amount',50)->nullable();
            $table->string('shipping_charge',50)->nullable();
            $table->string('total',50)->nullable();

            $table->string('payment_type',20)->default('0');
            $table->string('payment_status',20)->default('0');
            $table->string('payment_id')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('reference_no')->nullable();
            $table->string('tracking_id')->nullable();
            $table->string('shipping_status',11)->default('0');
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
        Schema::dropIfExists('orders');
    }
}
