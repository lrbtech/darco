<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role_name')->nullable();
            $table->string('dashboard')->nullable();
            $table->string('customers')->nullable();
            $table->string('vendors')->nullable();
            $table->string('reviews')->nullable();
            $table->string('product_category')->nullable();
            $table->string('product_category_create')->nullable();
            $table->string('product_category_edit')->nullable();
            $table->string('product_category_delete')->nullable();
            $table->string('professional_category')->nullable();
            $table->string('professional_category_create')->nullable();
            $table->string('professional_category_edit')->nullable();
            $table->string('professional_category_delete')->nullable();
            $table->string('idea_category')->nullable();
            $table->string('idea_category_create')->nullable();
            $table->string('idea_category_edit')->nullable();
            $table->string('idea_category_delete')->nullable();
            $table->string('city')->nullable();
            $table->string('city_create')->nullable();
            $table->string('city_edit')->nullable();
            $table->string('city_delete')->nullable();
            $table->string('orders')->nullable();
            $table->string('settlement_report')->nullable();
            $table->string('users')->nullable();
            $table->string('users_create')->nullable();
            $table->string('users_edit')->nullable();
            $table->string('users_delete')->nullable();
            $table->string('roles')->nullable();
            $table->string('roles_create')->nullable();
            $table->string('roles_edit')->nullable();
            $table->string('roles_delete')->nullable();
            $table->string('terms_and_conditions')->nullable();
            $table->string('privacy_policy')->nullable();
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
        Schema::dropIfExists('roles');
    }
}
