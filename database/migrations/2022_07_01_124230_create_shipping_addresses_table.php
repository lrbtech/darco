<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id',20)->nullable();
            $table->string('address_type',20)->nullable();
            $table->string('contact_person')->nullable();
            $table->string('contact_mobile')->nullable();
            $table->string('alternative_mobile')->nullable();

            $table->string('street_name')->nullable();
            $table->string('block')->nullable();
            $table->string('street')->nullable();
            $table->string('avenue')->nullable();
            $table->string('building_no')->nullable();
            $table->string('floor_no')->nullable();
            $table->string('apartment_no')->nullable();
            $table->text('additional_description')->nullable();

            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('landmark')->nullable();
            $table->string('country_code')->nullable();
            $table->string('country')->nullable();
            $table->string('area')->nullable();
            $table->string('city')->nullable();
            $table->string('zipcode',50)->nullable();
            $table->string('is_active',11)->default('0');
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
        Schema::dropIfExists('shipping_addresses');
    }
}
