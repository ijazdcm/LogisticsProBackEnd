<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        if(request()->isMethod('post'))
        {
           $file_customer_PAN_card="mimes:jpg,jpeg|max:5000";
           $file_customer_Aadhar_card="mimes:jpg,jpeg|max:5000";
           $file_customer_bank_passbook="mimes:jpg,jpeg|max:5000";

        }
        return [
            "customer_name" => ['required'],
            "customer_mobile_number" => ['required'],
            "customer_PAN_card_number" => [''],
            "customer_gst_number" => [''],
            "customer_Aadhar_card_number" => [''],
            "customer_PAN_card"=>"$file_customer_PAN_card",
            "customer_Aadhar_card"=>"$file_customer_Aadhar_card",
            "customer_bank_passbook"=>"$file_customer_bank_passbook",
            "customer_bank_id" => [''],
            "customer_bank_account_number" => [''],
            "customer_bank_branch" => [''],
            "customer_bank_ifsc_code" => [''],
            "customer_street_name" => [''],
            "customer_city" => [''],
            "customer_district" => [''],
            "customer_area" => [''],
            "customer_state" => [''],
            "customer_postal_code" => [''],
            "customer_region" => [''],
            "customer_payment_terms" => [''],
            "customer_status" => ['']

        ];
    }
}
