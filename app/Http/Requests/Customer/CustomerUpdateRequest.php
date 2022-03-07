<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CustomerUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if(request()->isMethod('put'))
        {
            if(request()->hasFile('customer_PAN_card'))
            {
                $file_validation_customer_PAN_card="mimes:jpg,jpeg|max:5000";
            }

            if(request()->hasFile('customer_Aadhar_card'))
            {
                $file_validation_customer_Aadhar_card="mimes:jpg,jpeg|max:5000";
            }

            if(request()->hasFile('customer_bank_passbook'))
            {
                $file_validation_customer_bank_passbook="mimes:jpg,jpeg|max:5000";
            }

        }

        return [
            "creation_type" => ['required'],
            "customer_name" => ['required'],
            "customer_mobile_number" => ['required', 'numeric', 'digits:10'],
            "customer_PAN_card_number" => [''],
            "customer_gst_number" => [''],
            "customer_Aadhar_card_number" => ['numeric'],
            "customer_PAN_card"=>"$file_validation_customer_PAN_card",
            "customer_Aadhar_card"=>"$file_validation_customer_Aadhar_card",
            "customer_bank_passbook"=>"$file_validation_customer_bank_passbook",
            "customer_bank_id" => ['exists:bank_infos,id'],
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
            "customer_payment_id"=> [''],
            "customer_code"=> [''],
            "incoterms" => [''],
            "incoterms_description" => [''],
            // "customer_status" => ['']
        ];

    }
}
