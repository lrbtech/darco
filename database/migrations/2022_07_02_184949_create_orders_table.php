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
            $table->text('order_message')->nullable();
            $table->string('sub_total',50)->nullable();
            $table->string('coupon_code',100)->nullable();
            $table->string('discount_value',50)->nullable();
            $table->string('after_discount',50)->nullable();
            $table->string('tax_percentage',11)->nullable();
            $table->string('tax_amount',50)->nullable();
            $table->string('shipping_charge',50)->nullable();
            $table->string('total',50)->nullable();

            $table->string('payment_type',20)->default('0');
            $table->string('payment_status',20)->default('0');
            $table->string('payment_id')->nullable();
            $table->string('invoiceid')->nullable();
            $table->string('invoiceurl')->nullable();
            $table->string('invoicestatus')->nullable();
            $table->string('invoicereference')->nullable();
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
