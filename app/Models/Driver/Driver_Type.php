<?php

namespace App\Models\Driver;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver_Type extends Model
{
    use HasFactory;

    protected $table="driver__types";

    protected $fillable=[
        "driver_type",
        "driver_type_status",
        "created_by",
    ];
}
