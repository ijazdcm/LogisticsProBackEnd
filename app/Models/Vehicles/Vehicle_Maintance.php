<?php

namespace App\Models\Vehicles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle_Maintance extends Model
{
    use HasFactory;

    protected $table="vehicle__maintances";

    protected $fillable=[
        "vehicle_id",
        "driver_id",
        "maintenance_typ",
        "maintenance_by",
        "work_order",
        "vendor_id",
        "maintenance_start_datetime",
        "maintenance_end_datetime",
        "remarks",
        "created_by",
    ];
}
