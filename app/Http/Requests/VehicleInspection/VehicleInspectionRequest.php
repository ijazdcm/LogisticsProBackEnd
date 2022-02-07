<?php

namespace App\Http\Requests\VehicleInspection;

use Illuminate\Foundation\Http\FormRequest;

class VehicleInspectionRequest extends FormRequest
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
            "vehicle_id"=>['required','exists:vehicle__infos,id'],
            "truck_clean"=>['required'],
            "bad_smell"=>['required'],
            "insect_vevils_presence"=>['required'],
            "tarpaulin_srf"=>['required'],
            "tarpaulin_non_srf"=>['required'],
            "insect_vevils_presence_in_tar"=>['required'],
            "truck_platform"=>['required'],
            "previous_load_details"=>['required'],
            "vehicle_fit_for_loading"=>['required'],
            "remarks"=>[''],
            "vehicle_inspection_status"=>['required'],

        ];
    }
}
