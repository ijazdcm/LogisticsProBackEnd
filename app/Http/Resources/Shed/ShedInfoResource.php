<?php

namespace App\Http\Resources\Shed;

use Illuminate\Http\Resources\Json\JsonResource;

class ShedInfoResource extends JsonResource
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
            "shed_id"=>$this->id,
            "shed_type_info"=>ShedTypeResource::make($this->whenLoaded('Shed_Type')),
            "shed_name"=>$this->shed_name,
            "shed_owner_name"=>$this->shed_owner_name,
            "shed_owner_phone_1"=>$this->shed_owner_phone_1,
            "shed_owner_phone_2"=>$this->shed_owner_phone_2,
            "shed_owner_address"=>$this->shed_owner_address,
            "shed_owner_photo"=>$this->shed_owner_photo,
            "pan_number"=>$this->pan_number,
            "shed_adhar_number"=>$this->shed_adhar_number,
            "gst_no"=>$this->gst_no,
            "shed_status"=>$this->shed_status,
            "created_at"=>$this->created_at->format('d.m.Y'),
        ];
    }
}
