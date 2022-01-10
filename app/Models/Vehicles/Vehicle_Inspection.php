<?php

namespace App\Models\Vehicles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle_Inspection extends Model
{
    use HasFactory;

    protected $table="vehicle__inspections";

    protected $fillable=[
        "vehicle_id",
        "truck_clean",
        "bad_smell",
        "insect_vevils_presence",
        "tarpaulin_srf",
        "tarpaulin_non_srf",
        "insect_vevils_presence_in_tar",
        "truck_platform",
        "previous_load_details",
        "vehicle_fit_for_loading",
        "remarks",
        "vehicle_inspection_status",
        "created_by",
    ];
}
