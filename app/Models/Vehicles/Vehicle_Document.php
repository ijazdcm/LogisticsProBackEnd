<?php

namespace App\Models\Vehicles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle_Document extends Model
{
    use HasFactory;

    protected $table="vehicle__documents";

    protected $fillable=[
        "vehicle_inspection_id",
        "vendor_id",
        "license_copy",
        "rc_copy_front",
        "rc_copy_back",
        "insurance_copy_front",
        "insurance_copy_back",
        "transport_shed_sheet",
        "tds_dec_form_front",
        "tds_dec_form_back",
        "shed_id",
        "insurance_validity",
        "ownership_transfer_form",
        "freight_rate_per_ton",
        "remarks",
        "document_status",
        "created_by",
    ];
}
