<?php

namespace App\Http\Resources\Customer;

use App\Http\Resources\Bank\BankInfoResource;
use App\Models\Customer\Customer;
use App\Models\Customer\Customer_info;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            "customer_id" => $this->id,
            "customer_name" => $this->customer_name,
            "customer_mobile_number" => $this->customer_mobile_number,
            "customer_PAN_card_number" => $this->customer_PAN_card_number,
            "customer_PAN_card" => url('/') . "/storage/" . Customer_info::CUSTOMER_PAN_CARD_PATH . $this->customer_PAN_card,
            "customer_Aadhar_card" => url('/') . "/storage/" . Customer_info::CUSTOMER_AADHAR_CARD_PATH . $this->customer_Aadhar_card,
            "customer_Aadhar_card_number"  => $this->customer_Aadhar_card_number,
            "customer_bank_passbook" => url('/') . "/storage/" . Customer_info::CUSTOMER_BANK_PASSBOOK_PATH . $this->customer_bank_passbook,
            "customer_bank_id" => BankInfoResource::make($this->whenLoaded('Bank_Name')),
            "customer_bank_branch"  => $this->customer_bank_branch,
            "customer_bank_ifsc_code"  => $this->customer_bank_ifsc_code,
            "customer_bank_account_number"  => $this->customer_bank_account_number,
            "customer_street_name"  => $this->customer_street_name,
            "customer_area"  => $this->customer_area,
            "customer_city"  => $this->customer_city,
            "customer_district"  => $this->customer_district,
            "customer_state"  => $this->customer_state,
            "customer_postal_code"  => $this->customer_postal_code,
            "customer_region"  => $this->customer_region,
            "customer_gst_number"  => $this->customer_gst_number,
            "customer_payment_terms"  => $this->customer_payment_terms,
            "customer_remarks"  => $this->customer_remarks,
            "customer_status"  => $this->customer_status,
            "created_by"  => $this->created_by
        ];
    }
}
