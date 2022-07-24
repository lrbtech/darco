<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdeaCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idea_categories', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('parent_id')->nullable();
            $table->string('category')->nullable();
            $table->string('image')->nullable();
            $table->string('icon')->nullable();
            $table->string('status')->default('0');
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
        Schema::dropIfExists('idea_categories');
    }
}
