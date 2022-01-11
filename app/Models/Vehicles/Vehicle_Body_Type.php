<?php

namespace App\Models\Vehicles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle_Body_Type extends Model
{
    use HasFactory;


    protected $table="vehicle__body__types";

    protected $fillable=[
        "vehicle_body_type",
        "vehicle_body_type_status",
        "created_by",
    ];



}
