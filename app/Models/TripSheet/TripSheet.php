<?php

namespace App\Models\TripSheet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripSheet extends Model
{
    use HasFactory;



    public const VEHICLE_CODE_BY_TYPE=[1=>'O',2=>'C',3=>'H'];
    public const VEHICLE_TYPE=['OWN'=>1,'CONTRACT'=>2,'HIRE'=>3];
    public const LOCATION_CODE_BY_LOCATION_ID=[1=>'S',2=>'T',3=>'C'];


    protected $table="trip_sheets";

    protected $fillable=[
        "trip_sheet_no",
        "vehicle_id",
        "driver_id",
        "to_divison",
        "trip_advance_eligiblity",
        "advance_amount",
        "purpose",
        "vehicle_sourced_by",
        "expected_date_time",
        "expected_return_date_time",
        "freight_rate_per_tone",
        "advance_payment_bank",
        "advance_payment_diesel",
        "vehicle_source_by",
        "remarks",
        "status",
        "created_by",
    ];
}
