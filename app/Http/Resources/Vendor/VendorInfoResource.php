<?php

namespace App\Http\Resources\Vendor;

use App\Http\Resources\DocumentVerification\DocumentVerificationResource;
use App\Http\Resources\ParkingYardGate\ParkingYardGateResource;
use App\Http\Resources\Shed\ShedInfoResource;
use Illuminate\Http\Resources\Json\JsonResource;

class VendorInfoResource extends JsonResource
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
            "vendor_id" => $this->id,
            'vehicle_id' => $this->vehicle_id,
            'shed_id' => $this->shed_id,
            'vendor_code' => $this->vendor_code,
            "owner_name" => $this->owner_name,
            "owner_number" => $this->owner_number,
            "pan_card_number" => $this->pan_card_number,
            "aadhar_card_number" => $this->aadhar_card_number,
            "bank_acc_number" => $this->bank_acc_number,
            "bank_name" => $this->bank_name,
            "bank_branch" => $this->bank_branch,
            "bank_acc_holder_name" => $this->bank_acc_holder_name,
            "bank_ifsc_code" => $this->bank_ifsc_code,
            "street" => $this->street,
            "area" => $this->area,
            "city" => $this->city,
            "district" => $this->district,
            "state" => $this->state,
            "postal_code" => $this->postal_code,
            "region" => $this->region,
            "gst_registration" => $this->gst_registration,
            "gst_registration_number" => $this->gst_registration_number,
            "gst_tax_code" => $this->gst_tax_code,
            "payment_term_3days" => $this->payment_term_3days,
            "vendor_status" => $this->vendor_status,
            "remarks" => $this->remarks,
            "parking_info" => ParkingYardGateResource::make($this->whenLoaded('Parking_Yard')),
            "document_info" => DocumentVerificationResource::make($this->whenLoaded('Vehicle_Document')),
            "shed_info" => ShedInfoResource::make($this->whenLoaded('Shed_Info')),
        ];
    }
}
