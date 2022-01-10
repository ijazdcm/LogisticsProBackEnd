<?php

namespace App\Models\Driver;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver_Info extends Model
{
    use HasFactory;

    protected $table="driver__types";

    protected $fillable=[
        "driver_type_id",
        "driver_name",
        "driver_code",
        "driver_phone_1",
        "driver_phone_2",
        "license_no",
        "license_validity_to",
        "license_copy_front",
        "license_copy_back",
        "license_validity_status",
        "driver_address",
        "driver_photo",
        "aadhar_card",
        "pan_card",
        "driver_status",
        "created_by",
    ];
}
