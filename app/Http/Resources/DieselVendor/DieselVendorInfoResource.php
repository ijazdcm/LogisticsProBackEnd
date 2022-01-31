<?php

namespace App\Http\Resources\DieselVendor;

use Illuminate\Http\Resources\Json\JsonResource;

class DieselVendorInfoResource extends JsonResource
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
            "diesel_vendor_id" => $this->id,
            "created_at" => $this->created_at->format('d.m.Y'),
            "diesel_vendor_name" => $this->diesel_vendor_name,
            "vendor_code" => $this->vendor_code,
            "vendor_phone_1" => $this->vendor_phone_1,
            "vendor_phone_2" => $this->vendor_phone_2,
            "vendor_email" => $this->vendor_email_id,
            "diesel_vendor_status" => $this->diesel_vendors_status
        ];
    }
}
