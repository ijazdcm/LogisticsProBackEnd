<?php

namespace App\Http\Requests\DieselVendor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class DieselVendorRequest extends FormRequest
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

        return [
            "diesel_vendor_name" => ['required'],
            "vendor_code" =>  ['required', 'numeric', 'digits:6'],
            "vendor_phone_1" => ['required', 'numeric', 'digits:10'],
            "vendor_phone_2" => ['required', 'numeric', 'digits:10'],
            "vendor_email_id" => ['required', 'email'],
            "diesel_vendors_status" => ['sometimes', 'required'],
        ];
    }
}
