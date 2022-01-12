<?php

namespace App\Http\Requests\Driver;

use Illuminate\Foundation\Http\FormRequest;

class DriverInfoPutRequest extends FormRequest
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

        if(request()->hasFile('license_copy_front'))
        {
            $file_validation_license_copy_front="required";
        }
        else{

            $file_validation_license_copy_front="sometimes";
        }
        if(request()->hasFile('license_copy_back'))
        {
            $file_validation_license_copy_back="required";
        }
        else{

            $file_validation_license_copy_back="sometimes";
        }
        if(request()->hasFile('driver_photo'))
        {
            $file_validation_driver_photo="required";
        }
        else{

            $file_validation_driver_photo="sometimes";
        }
        if(request()->hasFile('aadhar_card'))
        {
            $file_validation_aadhar_card="required";
        }
        else{

            $file_validation_aadhar_card="sometimes";
        }
        if(request()->hasFile('pan_card'))
        {
            $file_validation_pan_card="required";
        }
        else{

            $file_validation_pan_card="sometimes";
        }
        return [
            "driver_type_id"=>['required'],
            "driver_name"=>['required'],
            "driver_code"=>['required','numeric','min:6'],
            "driver_phone_1"=>['required','numeric','digits:10'],
            "driver_phone_2"=>['required','numeric','digits:10'],
            "license_no"=>['required','alpha_num'],
            "license_validity_to"=>['required','date'],
            "license_copy_front"=>[$file_validation_license_copy_front,'max:5000','mimes:png,jpg,jpeg'],
            "license_copy_back"=>[$file_validation_license_copy_back,'max:5000','mimes:png,jpg,jpeg'],
            "driver_address"=>['required'],
            "driver_photo"=>[$file_validation_driver_photo,'max:5000','mimes:png,jpg,jpeg'],
            "aadhar_card"=>[$file_validation_aadhar_card,'max:5000','mimes:png,jpg,jpeg'],
            "pan_card"=>[$file_validation_pan_card,'max:5000','mimes:png,jpg,jpeg'],
        ];
    }
}
