<?php

namespace App\Http\Requests\Driver;

use Illuminate\Foundation\Http\FormRequest;

class DriverInfoPostRequest extends FormRequest
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
            "driver_type_id" => ['required', 'exists:driver__types,id'],
            "driver_name" => ['required'],
            "driver_code" => ['required', 'numeric', 'min:6', 'unique:driver__infos,driver_code'],
            "driver_phone_1" => ['required', 'numeric', 'digits:10'],
            "driver_phone_2" => ['required', 'numeric', 'digits:10'],
            "license_no" => ['required', 'alpha_num', 'unique:driver__infos,license_no'],
            "license_validity_to" => ['required', 'date'],
            "license_copy_front" => ['required', 'max:5000', 'mimes:png,jpg,jpeg,pdf'],
            "license_copy_back" => ['required', 'max:5000', 'mimes:png,jpg,jpeg,pdf'],
            "driver_address" => ['required'],
            "driver_photo" => ['required', 'max:5000', 'mimes:png,jpg,jpeg,pdf'],
            "aadhar_card" => ['required', 'max:5000', 'mimes:png,jpg,jpeg,pdf'],
            "pan_card" => ['required', 'max:5000', 'mimes:png,jpg,jpeg,pdf'],
            "license_validity_status" => ['sometimes', 'required'],
        ];
    }
}