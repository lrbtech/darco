<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_posts', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('vendor_id',20)->nullable();
            $table->string('customer_id',20)->nullable();
            $table->text('product_attributes')->nullable();
            $table->string('product_id',20)->nullable();
            $table->string('product_name')->nullable();
            $table->string('report_category')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('report_posts');
    }
}
