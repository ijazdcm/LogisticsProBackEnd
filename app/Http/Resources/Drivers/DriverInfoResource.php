<?php

namespace App\Http\Resources\Drivers;

use Illuminate\Http\Resources\Json\JsonResource;

class DriverInfoResource extends JsonResource
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
            "driver_id"=>$this->id,
            "driver_type_info"=>DriverTypeResource::make($this->whenLoaded('driver__types')),
            "driver_name"=>$this->driver_name,
            "driver_code"=>$this->driver_code,
            "driver_phone_1"=>$this->driver_phone_1,
            "driver_phone_2"=>$this->driver_phone_2,
            "license_no"=>$this->license_no,
            "license_validity_to"=>$this->license_validity_to,
            "license_copy_front"=>$this->license_copy_front,
            "license_copy_back"=>$this->license_copy_back,
            "license_validity_status"=>$this->license_validity_status,
            "driver_address"=>$this->driver_address,
            "driver_photo"=>$this->driver_photo,
            "aadhar_card"=>$this->aadhar_card,
            "pan_card"=>$this->pan_card,
            "driver_status"=>($this->driver_status)?$this->driver_status: 1,
        ];
    }
}
