<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_carts', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id')->nullable();
            $table->string('vendor_id')->nullable();
            $table->string('product_id')->nullable();
            $table->string('product_name')->nullable();
            $table->string('qty')->default('0');
            $table->string('price')->default('0');
            $table->string('total')->default('0');
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
        Schema::dropIfExists('app_carts');
    }
}
