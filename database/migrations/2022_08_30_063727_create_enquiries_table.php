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
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->integer('fk_int_user_id')->nullable();   
            $table->integer('fk_int_purpose_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('taluk_id')->nullable();
            $table->integer('payment_reffer_id')->nullable();
            $table->string('vchr_customer_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('vchr_customer_company_name')->nullable();
            $table->integer('country_code')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('competing_model')->nullable();
            $table->string('remarks')->nullable();
            $table->string('vchr_customer_mobile')->nullable();
            $table->string('vchr_customer_email')->nullable();
            $table->string('landline_number')->nullable();
            $table->longText('vchr_enquiry_feedback');
            $table->integer('fk_int_enquiry_type_id');
            $table->integer('int_status')->default(1);
            $table->string('read_status')->default(1)->nullable();
            $table->integer('new_status')->default(0);
            $table->integer('feedback_status')->nullable();
            $table->tinyInteger('followup_required')->default(0);
            $table->integer('staff_id')->nullable();
            $table->date('event_date')->nullable();
            $table->date('assigned_date')->nullable();
            $table->date('read_at')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->text('address')->nullable();
            $table->integer('lead_type_id')->nullable();
            $table->date('purchase_date')->nullable();
            $table->string('exp_wt_grams')->nullable()->comment('expected_wt_in_grams');
            $table->text('more_phone_numbers')->nullable();
            $table->string('photo')->nullable();
            $table->unsignedBigInteger('reason_id')->nullable();
            $table->integer('designation_id')->nullable();
            $table->integer('otp')->nullable();
            $table->datetime('otp_validity')->nullable();
            $table->string('password',1000)->nullable();
            $table->integer('otp_attempts')->default(0);
            $table->date('otp_attempt_date')->nullable();
            $table->string('fb_ad_id')->nullable();
            $table->mediumText('fb_ad_info')->nullable();
            $table->integer('woocommerce_id')->nullable();
            $table->string('model_id')->nullable(); 
            $table->string('purchase_plan')->nullable();  
            $table->string('date_of_purchase')->nullable(); 
            $table->string('live_deal')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('enquiries');
    }
};
