<?php

namespace App\Http\Resources\DocumentVerification;

use Illuminate\Http\Resources\Json\JsonResource;

class DocumentVerificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            "vehicle_id" => $this->vehicle_id,
            "vehicle_inspection_id" => $this->vehicle_inspection_id,
            "vendor_id" => $this->vendor_id,
            "license_copy" => $this->license_copy,
            "rc_copy_front" => $this->rc_copy_front,
            "rc_copy_back" => $this->rc_copy_back,
            "insurance_copy_front" => $this->insurance_copy_front,
            "insurance_copy_back" => $this->insurance_copy_back,
            "transport_shed_sheet" => $this->transport_shed_sheet,
            "tds_dec_form_front" => $this->tds_dec_form_front,
            "tds_dec_form_back" => $this->tds_dec_form_back,
            "shed_id" => $this->shed_id,
            "insurance_validity" => $this->insurance_validity,
            "ownership_transfer_form" => $this->ownership_transfer_form,
            "freight_rate_per_ton" => $this->freight_rate_per_ton,
            "vendor_flag" => $this->vendor_flag,
            "document_status" => $this->document_status,
            "remarks" => $this->remarks,
        ];
    }
}
