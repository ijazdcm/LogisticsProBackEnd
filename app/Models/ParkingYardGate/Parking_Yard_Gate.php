<?php

namespace App\Models\ParkingYardGate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking_Yard_Gate extends Model
{
    use HasFactory;

    protected $table="parking__yard__gates";

    protected $fillable=[
        "vehicle_type_id",
        "vehicle_id",
        "driver_id",
        "odometer_km",
        "odometer_photo",
        "vehicle_number",
        "vehicle_capacity_id",
        "driver_name",
        "driver_contact_number",
        "vehicle_body_type_id",
        "party_name",
        "remarks",
        "parking_status",
        "gate_in_date_time",
        "gate_out_date_time",
        "created_by",
    ];
}
