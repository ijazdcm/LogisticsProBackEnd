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
            "driver_id"=>[''],
            "maintenance_typ"=>['required'],
            "maintenance_by"=>[''],
            "work_order"=>[''],
            "vendor_id"=>[''],
            "maintenance_start_datetime"=>[''],
            "opening_odometer_km"=>[''],
            "closing_odometer_km"=>[''],
            "maintenance_end_datetime"=>[''],
            "remarks"=>[''],
        ];
    }
}
