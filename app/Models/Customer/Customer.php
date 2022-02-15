<?php

namespace App\Models\Customer;

use App\Models\Bank\Bank_info;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    //FILE PATH CONSTANTS FOR FILE HANDLE FOR THIS MODEL
    public const CUSTOMER_PAN_CARD_PATH = "Customer/pan_card/";
    public const CUSTOMER_AADHAR_CARD_PATH = "Customer/Aadhar_card";
    public const CUSTOMER_BANK_PASSBOOK_PATH = "Customer/Bank_passbook/";

    protected $table = "customer_infos";

    protected $fillable = [
        "customer_name",
        "customer_mobile_number",
        "customer_PAN_card_number",
        "customer_PAN_card",
        "customer_Aadhar_card",
        "customer_Aadhar_card_number",
        "customer_bank_passbook",
        "customer_bank_id",
        "customer_bank_branch",
        "customer_bank_ifsc_code",
        "customer_bank_account_number",
        "customer_street_name",
        "customer_area",
        "customer_city",
        "customer_district",
        "customer_state",
        "customer_postal_code",
        "customer_region",
        "customer_gst_number",
        "customer_payment_terms",
        "customer_remarks",
        "customer_status",
        "created_by",
    ];

    protected $dates = ['created_at'];

    public function Bank_Name()
    {
        return $this->hasOne(Bank_info::class, 'id', 'customer_bank_id');
    }

}
