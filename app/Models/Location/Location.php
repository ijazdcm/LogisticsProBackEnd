<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table="locations";

    protected $fillable=[
        "location_name",
        "location_status",
        "created_by",
    ];
}
