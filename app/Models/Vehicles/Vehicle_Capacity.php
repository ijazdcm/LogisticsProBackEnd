<?php

namespace App\Models\Vehicles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle_Capacity extends Model
{
    use HasFactory;

    protected $table="vehicle__capacities";

    protected $fillable=[
        "vehicle_capacity",
        "vehicle_status",
        "created_by",
    ];



}
