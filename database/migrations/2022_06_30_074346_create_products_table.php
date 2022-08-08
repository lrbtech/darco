<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_id',20)->nullable();
            $table->string('product_group',20)->nullable();
            $table->string('product_code',50)->nullable();
            $table->string('hsn_code',50)->nullable();
            $table->string('product_name')->nullable();
            $table->string('category',20)->nullable();
            $table->string('subcategory',20)->nullable();
            $table->string('subsubcategory',20)->nullable();
            $table->string('mrp_price',20)->nullable();
            $table->string('sales_price',20)->nullable();
            $table->string('stock_status',20)->default('0');
            $table->string('stock',20)->default('0');
            $table->TEXT('description')->nullable();
            $table->TEXT('specifications')->nullable();
            $table->string('height_weight_size')->nullable();
            $table->string('shipping_enable',11)->default('0');
            $table->string('shipping_charge',20)->nullable();
            $table->string('tax_type',20)->default('0');
            $table->string('tax_percentage',20)->nullable();
            $table->string('return_policy',20)->nullable();
            $table->string('return_days',20)->nullable();
            $table->string('assured_seller',20)->nullable();
            $table->string('delivery_available',20)->nullable();
            $table->string('rest_assured_seller',20)->nullable();
            $table->string('most_trusted',20)->nullable();
            $table->TEXT('shipping_description')->nullable();
            $table->TEXT('return_description')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('products');
    }
}
