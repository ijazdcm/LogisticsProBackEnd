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
            "customer_name" => "required|alpha",
            "customer_mobile_number" => "required|numeric",
            "customer_PAN_card_number" => ['alpha_num'],
            "customer_gst_number" => ['alpha_num'],
            "customer_Aadhar_card_number" => ['numeric'],
            "customer_PAN_card"=>"$file_customer_PAN_card",
            "customer_Aadhar_card"=>"$file_customer_Aadhar_card",
            "customer_bank_passbook"=>"$file_customer_bank_passbook",
            "customer_bank_id" => ['alpha'],
            "customer_bank_account_number" => ['numeric'],
            "customer_bank_branch" => ['alpha'],
            "customer_bank_ifsc_code" => ['alpha_num'],
            "customer_street_name" => ['alpha_num'],
            "customer_city" => ['alpha'],
            "customer_district" => ['alpha'],
            "customer_area" => ['alpha'],
            "customer_state" => ['alpha'],
            "customer_postal_code" => ['numeric'],
            "customer_region" => ['numeric'],
            "customer_payment_terms" => ['alpha'],
            // "customer_status" => ['']

        ];
    }
}
