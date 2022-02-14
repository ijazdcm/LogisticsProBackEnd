<?php

namespace App\Http\Resources\ParkingYardGate;

use App\Http\Resources\VehicleInspection\VehicleInspectionResource;
use App\Http\Resources\Vehicles\VehicleBodyResource;
use App\Http\Resources\Vehicles\VehicleCapacityResource;
use App\Http\Resources\Vehicles\VehicleTypeResource;
use App\Models\ParkingYardGate\Parking_Yard_Gate;
use Illuminate\Http\Resources\Json\JsonResource;

class ParkingYardGateResource extends JsonResource
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
            "parking_yard_gate_id" => $this->id,
            "vehicle_type_id" => VehicleTypeResource::make($this->whenLoaded('Vehicle_Type')),
            "vehicle_id" => $this->vehicle_id,
            "driver_id" => $this->driver_id,
            "odometer_km" => $this->odometer_km,
            "odometer_photo" => url('/') . "/storage/" . Parking_Yard_Gate::ODOMETER_PHOTO_PATH . $this->odometer_photo,
            "vehicle_number" => $this->vehicle_number,
            "vehicle_capacity_id" => VehicleCapacityResource::make($this->whenLoaded('Vehicle_Capacity')),
            "driver_name" => $this->driver_name,
            "driver_contact_number" => $this->driver_contact_number,
            "vehicle_body_type_id" => VehicleBodyResource::make($this->whenLoaded('Vehicle_Body_Type')),
            "party_name" => $this->party_name,
            "remarks" => $this->remarks,
            "parking_status" => $this->parking_status,
            "gate_in_date_time" => $this->gate_in_date_time->diff()->format('%h hrs and %i min'),
            "gate_out_date_time" => $this->gate_out_date_time->diff()->format('%h hrs and %i min'),
            "created_at" => $this->created_at->diff()->format('%h hrs and %i min'),
            "updated_at" => $this->updated_at->diff()->format('%h hrs and %i min'),
            "gate_in_date_time_string" => $this->created_at->format('jS F Y h:i:s A'),
            "vehicle_inspection" => VehicleInspectionResource::make($this->whenLoaded('Vehicle_Inspection')),
        ];
    }
}
