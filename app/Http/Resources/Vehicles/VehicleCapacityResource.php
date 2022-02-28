<?php

namespace App\Http\Resources\Vehicles;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleCapacityResource extends JsonResource
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
            "id" => $this->id,
            "capacity" => $this->vehicle_capacity,
            "vehicle_status" => $this->vehicle_status,
            'created_at' => $this->created_at->format('d-m-y'),
        ];
    }
}
