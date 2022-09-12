<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id', 191)->nullable()->default(null);
            $table->string('user_name')->nullable();
            $table->string('email')->unique();

            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('user_roles')->onDelete('cascade');

            $table->integer('countrycode')->nullable()->default('91');
            $table->string('mobile', 191)->nullable()->default(null);
            $table->string('user_imei', 191)->nullable()->default(null);
            $table->string('user_mobile', 20)->nullable()->unique();
            $table->string('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('int_role_id')->nullable();
            $table->integer('int_status');
            $table->dateTime('datetime_last_login')->nullable()->default(null);
            $table->string('vchr_logo', 191)->nullable()->default(null);
            $table->bigInteger('telegram_id')->nullable()->default('0');
            $table->integer('parent_user_id')->nullable()->default(null);
            $table->integer('designation_id')->nullable()->default(null);
            $table->string('address', 191)->nullable()->default(null);
            $table->string('gst_number', 191)->nullable()->default(null);
            $table->integer('verify_email')->default('0');
            $table->integer('int_module')->nullable()->default('1');
            $table->integer('int_registration_from')->default('1');
            $table->integer('int_is_emergency_account')->default('0');
            $table->unique(["user_imei"], 'imei');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
