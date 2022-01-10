<?php

namespace App\Models\Vendor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor_Info extends Model
{
    use HasFactory;

    protected $table="vendor__infos";

    protected $fillable=[
        "shed_id",
        "owner_name",
        "pan_card_number",
        "pan_card_attachment",
        "aadhar_card_number",
        "aadhar_card_copy",
        "license_copy",
        "rc_copy_front",
        "rc_copy_back",
        "insurance_copy",
        "transpoter_shed_sheet",
        "bank_pass_book_copy",
        "bank_name",
        "bank_branch",
        "bank_ifsc_Code",
        "bank_acc_number",
        "bank_acc_holder_name",
        "street",
        "area",
        "city",
        "district",
        "state",
        "postal_code",
        "region",
        "tds_decelration_form_front",
        "tds_decelration_form_back",
        "gts_registration",
        "gts_registration_number",
        "gst_tax_code",
        "payment_term_3days",
        "remarks",
        "vandor_status",
        "created_by",

    ];
}
