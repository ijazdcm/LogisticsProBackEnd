<?php

namespace App\Models\Vehicles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle_Type extends Model
{
    use HasFactory;

    protected $table="vehicle__types";

    protected $fillable=[
        "vehicle_type",
        "vehicle_type_status",
        "created_by",
    ];
}
