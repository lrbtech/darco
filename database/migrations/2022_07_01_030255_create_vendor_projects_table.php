<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_projects', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_id',20)->nullable();
            $table->string('project_name')->nullable();
            $table->string('category',20)->nullable();
            $table->string('subcategory',20)->nullable();
            $table->TEXT('description')->nullable();
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
        Schema::dropIfExists('vendor_projects');
    }
}
