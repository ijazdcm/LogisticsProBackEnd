<?php

namespace App\Models\Vehicles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicle_maintenance_type extends Model
{
    use HasFactory;

    protected $table="vehicle_maintenance_type";

    protected $fillable=[
        "vehicle_maintenance_type",
        "vehicle_type_status",
        "created_by",
    ];
}
