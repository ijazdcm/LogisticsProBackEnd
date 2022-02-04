<?php

namespace App\Http\Requests\Vehicles;

use Illuminate\Foundation\Http\FormRequest;

class VehicleInfoUpdateRequest extends FormRequest
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
            if(request()->hasFile('rc_copy_front'))
            {
                $file_validation_rc_copy_front="required|mimes:jpg,jpeg|max:5000";
            }
            else{

                $file_validation_rc_copy_front="sometimes";
            }
            if(request()->hasFile('rc_copy_back'))
            {
                $file_validation_rc_copy_back="required|mimes:jpg,jpeg|max:5000";
            }
            else{

                $file_validation_rc_copy_back="sometimes";
            }
            if(request()->hasFile('insurance_copy_front'))
            {
                $file_validation_insurance_copy_front="required|mimes:jpg,jpeg|max:5000";
            }
            else{

                $file_validation_insurance_copy_front="sometimes";
            }
            if(request()->hasFile('insurance_copy_back'))
            {
                $file_validation_insurance_copy_back="required|mimes:jpg,jpeg|max:5000";
            }
            else{

                $file_validation_insurance_copy_back="sometimes";
            }

        }

        return [
            "vehicle_type_id"=>"required|numeric",
            "vehicle_number"=>"required|alpha_num",
            "vehicle_capacity_id"=>"required|numeric",
            "vehicle_body_type_id"=>"required|numeric|max:2|min:1",
            "rc_copy_front"=>"$file_validation_rc_copy_front",
            "rc_copy_back"=>"$file_validation_rc_copy_back",
            "insurance_copy_front"=>"$file_validation_insurance_copy_front",
            "insurance_copy_back"=>"$file_validation_insurance_copy_back",
            "insurance_validity"=>"required|date",
            "fc_validity"=>"required|date"
        ];

    }
}
