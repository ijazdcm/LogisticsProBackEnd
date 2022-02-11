<?php

namespace App\Http\Requests\VehicleMaintenance;

use Illuminate\Foundation\Http\FormRequest;

class VehicleMaintenanceRequest extends FormRequest
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
            "driver_id"=>['required'],
            "maintenance_typ"=>['required'],
            "maintenance_by"=>['required'],
            "work_order"=>['required'],
            "vendor_id"=>['required'],
            "maintenance_start_datetime"=>['required'],
            "closing_odometer_km"=>[''],
            "maintenance_end_datetime"=>[''],
            "remarks"=>[''],
        ];
    }
}
