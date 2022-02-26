<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;
use App\Helper\File\FileHelper;
use App\Models\Customer\Customer_info;

class CustomerRequest extends FormRequest
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

        // if(request()->isMethod('post'))
        // {
        //    $file_customer_PAN_card="mimes:jpg,jpeg|max:5000";
        //    $file_customer_Aadhar_card="mimes:jpg,jpeg|max:5000";
        //    $file_customer_bank_passbook="mimes:jpg,jpeg|max:5000";

        // }
        return [
            "creation_type" => ['required'],
            "customer_name" => ['required'],
            "customer_mobile_number" => ['required', 'numeric', 'digits:10'],
            "customer_PAN_card_number" => [''],
            "customer_gst_number" => [''],
            "customer_Aadhar_card_number" => [''],
            "customer_PAN_card"=>[ ''],
            "customer_Aadhar_card"=>[ ''],
            "customer_bank_passbook"=>[ ''],
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
            "customer_status" => ['']

        ];
    }

//     public function validated(): array
//     {
//         if (true) {
//             return array_merge(parent::validated(), ['customer_PAN_card' => (new FileHelper())->storeImage(request()->customer_PAN_card,Customer_info::CUSTOMER_PAN_CARD_PATH)]);
//         }
//         if (true) {
//             return array_merge(parent::validated(), ['customer_Aadhar_card' => (new FileHelper())->storeImage(request()->customer_Aadhar_card,Customer_info::CUSTOMER_AADHAR_CARD_PATH)]);
//         }
//         if (true) {
//             return array_merge(parent::validated(), ['customer_bank_passbook' => (new FileHelper())->storeImage(request()->customer_bank_passbook,Customer_info::CUSTOMER_BANK_PASSBOOK_PATH)]);
//         }
//         return parent::validated();
//     }
}
