<?php

namespace App\Http\Resources\Vendor;

use App\Http\Resources\DocumentVerification\DocumentVerificationResource;
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
            "Documents_info" => DocumentVerificationResource::make($this->whenLoaded('Vehicle_Document_Info')),
            "shed_info" => ShedInfoResource::make($this->whenLoaded('Shed_Info')),
            "owner_name" => $this->owner_name,
            "pan_card_number" => $this->pan_card_number,
            "aadhar_card_number" => $this->aadhar_card_number,
            "bank_acc_number" => $this->bank_acc_number,
            // "pan_card_attachment" => $this->pan_card_attachment,
            // "aadhar_card_copy" => $this->aadhar_card_copy,
            // "license_copy" => $this->license_copy,
            // "rc_copy_front" => $this->rc_copy_front,
            // "rc_copy_back" => $this->rc_copy_back,
            // "insurance_copy" => $this->insurance_copy,
            // "transpoter_shed_sheet" => $this->transpoter_shed_sheet,
            // "bank_pass_book_copy" => $this->bank_pass_book_copy,
            // "bank_name" => $this->bank_name,
            // "bank_branch" => $this->bank_branch,
            // "bank_ifsc_Code" => $this->bank_ifsc_Code,
            // "bank_acc_holder_name" => $this->bank_acc_holder_name,
            // "street" => $this->street,
            // "area" => $this->area,
            // "city" => $this->city,
            // "district" => $this->district,
            // "state" => $this->state,
            // "postal_code" => $this->postal_code,
            // "region" => $this->region,
            // "tds_decelration_form_front" => $this->tds_decelration_form_front,
            // "tds_decelration_form_back" => $this->tds_decelration_form_back,
            // "gts_registration" => $this->gts_registration,
            // "gts_registration_number" => $this->gts_registration_number,
            // "gst_tax_code" => $this->gst_tax_code,
            // "payment_term_3days" => $this->payment_term_3days,
            // "remarks" => $this->remarks,
        ];
    }
}
