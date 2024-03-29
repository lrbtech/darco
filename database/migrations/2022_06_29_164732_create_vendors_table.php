<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('user_id',20)->default('0');
            $table->string('vendor_unique_id')->nullable();
            $table->string('email')->nullable();
            $table->string('is_email_verify',11)->default('0');
            $table->string('date')->nullable();
            $table->string('username')->nullable();
            $table->string('business_type')->nullable();
            $table->string('business_name')->nullable();
            $table->string('business_category')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('trade_license_no')->nullable();
            $table->string('vat_certificate_no')->nullable();
            $table->string('civi_id_or_passport')->nullable();
            $table->string('commercial_license_no')->nullable();
            $table->string('id_proof')->nullable();
            $table->string('civi_id_or_passport_copy')->nullable();
            $table->string('commercial_license_copy')->nullable();
            $table->string('article_of_association')->nullable();
            $table->string('password')->nullable();
            $table->string('city')->nullable();
            $table->string('area')->nullable();
            $table->string('zipcode')->nullable();
            $table->TEXT('address')->nullable();
            $table->string('website')->nullable();
            $table->string('landline')->nullable();
            $table->TEXT('about_us')->nullable();
            $table->string('country_code')->nullable();
            $table->string('country')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('login_status')->default('0');
            $table->string('status')->default('0');
            $table->string('role_id')->default('admin');
            $table->string('vendor_commission')->default('0');
            $table->string('package_id')->nullable();
            $table->string('account_number')->nullable();
            $table->string('account_name')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('iban_number')->nullable();
            $table->string('swift_code')->nullable();
            $table->string('admin_pay')->nullable();
            $table->string('admin_paid')->nullable();
            $table->string('admin_balance')->nullable();
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('vendors');
    }
}
