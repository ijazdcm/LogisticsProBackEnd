<?php

namespace App\Http\Resources\DocumentVerification;

use App\Models\Vehicles\Vehicle_Document;
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
            "shed_id" => $this->shed_id,
            "vendor_id" => $this->vendor_id,
            "vendor_flag" => $this->vendor_flag,
            "document_status" => $this->document_status,
            "remarks" => $this->remarks,
            "insurance_validity" =>  $this->insurance_validity,
            "freight_rate_per_ton" => $this->freight_rate_per_ton,
            "license_copy" => url('/') . "/storage/" . Vehicle_Document::LICENSE_COPY_PATH . $this->license_copy,
            "aadhar_copy" => url('/') . "/storage/" . Vehicle_Document::AADHAR_COPY_PATH . $this->aadhar_copy,
            "pan_copy" => url('/') . "/storage/" . Vehicle_Document::PAN_COPY_PATH . $this->pan_copy,
            "bank_pass_copy" => url('/') . "/storage/" . Vehicle_Document::BANK_PASS_COPY_PATH . $this->bank_pass_copy,
            "rc_copy_front" => url('/') . "/storage/" . Vehicle_Document::RC_COPY_FRONT_PATH . $this->rc_copy_front,
            "rc_copy_back" => url('/') . "/storage/" . Vehicle_Document::RC_COPY_BACK_PATH . $this->rc_copy_back,
            "insurance_copy_front" => url('/') . "/storage/" . Vehicle_Document::INSURANCE_COPY_FRONT_PATH . $this->insurance_copy_front,
            "insurance_copy_back" => url('/') . "/storage/" . Vehicle_Document::INSURANCE_COPY_BACK_PATH . $this->insurance_copy_back,
            "transport_shed_sheet" => url('/') . "/storage/" . Vehicle_Document::TRANSPORT_SHED_SHEET_COPY_PATH . $this->transport_shed_sheet,
            "tds_dec_form_front" => url('/') . "/storage/" . Vehicle_Document::TDS_DEC_FORM_COPY_FRONT_PATH . $this->tds_dec_form_front,
            "tds_dec_form_back" => url('/') . "/storage/" . Vehicle_Document::TDS_DEC_FORM_COPY_BACK_PATH . $this->tds_dec_form_back,
            "ownership_transfer_form" => url('/') . "/storage/" . Vehicle_Document::OWNERSHIP_TRANSFER_FORM_PATH . $this->ownership_transfer_form,
        ];
    }
}
