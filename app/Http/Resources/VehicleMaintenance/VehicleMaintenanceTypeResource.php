<?php

namespace App\Http\Resources\VehicleMaintenance;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleMaintenanceTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id"=>$this->id,
            "type"=>$this->vehicle_type,
        ];
    }
}
