<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;
    protected $fillable = [
     'vchr_enquiry_feedback','fk_int_enquiry_type_id',
     'fk_int_user_id','fk_int_purpose_id','district_id','taluk_id','payment_reffer_id','vchr_customer_name',
     'date_of_birth','vchr_customer_company_name','country_code','mobile_no','competing_model','remarks',
     'vchr_customer_mobile','vchr_customer_email','landline_number','vchr_enquiry_feedback','fk_int_enquiry_type_id',
     'int_status','read_status','new_status','feedback_status','followup_required','staff_id','event_date',
     'assigned_date','read_at','created_by','updated_by','address','lead_type_id','purchase_date','exp_wt_grams',
     'more_phone_numbers','photo','reason_id','designation_id','otp','otp_validity','password',
     'otp_attempts','otp_attempt_date','fb_ad_id','fb_ad_info','woocommerce_id','model_id','purchase_plan','date_of_purchase',
     'date_of_purchase','live_deal'
    ];
}
