<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorCustomerChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_customer_chats', function (Blueprint $table) {
            $table->id();
            $table->string('enquiry_id')->nullable();
            $table->string('vendor_id')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('message_from')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->string('attachment')->default('0');
            $table->string('attachment_file')->nullable();
            $table->TEXT('message')->nullable();
            $table->string('staus')->default('0');

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
        Schema::dropIfExists('vendor_customer_chats');
    }
}
