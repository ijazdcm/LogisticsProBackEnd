<?php

namespace App\Models\Vehicles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle_Info extends Model
{
    use HasFactory;

    protected $table="vehicle__infos";

    protected $fillable=[
        "vehicle_type_id",
        "vehicle_number",
        "vehicle_capacity_id",
        "vehicle_body_type_id",
        "rc_copy_front",
        "rc_copy_back",
        "insurance_copy_front",
        "insurance_copy_back",
        "insurance_validity",
        "fc_validity",
        "vehicle_status",
        "created_by",
    ];
}
