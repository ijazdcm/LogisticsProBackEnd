<?php

namespace App\Http\Resources\VehicleMaintenance;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Request;

class VehicleMaintenanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if (Request::isMethod('post')) {
            return parent::toArray($request);
        return [
            "maintenance_id" => $this->id,
            "vehicle_id" => $this->vehicle_id,
            "maintenance_typ" => $this->maintenance_typ,
            "maintenance_by" => $this->maintenance_by,
            "work_order" => $this->work_order,
            "vendor_id" => $this->vendor_id,
            "opening_odometer_km" => $this->opening_odometer_km,
            "closing_odometer_km" => $this->closing_odometer_km,
            "maintenance_start_datetime" => $this->maintenance_start_datetime,
            "maintenance_end_datetime" => $this->maintenance_end_datetime,
            "vehicle_maintenance_status" => $this->vehicle_maintenance_status,
        ];
    }
}
}
