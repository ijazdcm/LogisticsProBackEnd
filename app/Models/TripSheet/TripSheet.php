<?php

namespace App\Models\TripSheet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripSheet extends Model
{
    use HasFactory;


    protected $table="trip_sheets";

    protected $fillable=[
        "vehicle_id",
        "driver_id",
        "division_id",
        "trip_advance_eligiblity",
        "advance_amount",
        "purpose",
        "expected_date_time",
        "expected_return_date_time",
        "freight_rate_per_tone",
        "advance_payment_bank",
        "advance_payment_diesel",
        "remarks",
        "status",
        "created_by",
    ];
}
