<?php

namespace App\Models\ParkingYardGate;

use App\Models\Vehicles\Vehicle_Body_Type;
use App\Models\Vehicles\Vehicle_Capacity;
use App\Models\Vehicles\Vehicle_Type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking_Yard_Gate extends Model
{
    use HasFactory;

    /**
     * description:This VEHICLE_VALIDATION_IDS is used in validation part
     * to dynamically get a validation  rules
     *@param array VEHICLE_VALIDATION_IDS
     */
    public const VEHICLE_VALIDATION_IDS=["OWN"=>1,"CONTRACT"=>2,"HIRE"=>3,"PARTY"=>4];

    public const ODOMETER_PHOTO_PATH='ParkingYardGate/OdometerPhoto/';

    /**
     * Undocumented variable
     *
     * @var string
     */
    public const PKY_GATE_ACTION_TYPE=["GATE_IN"=>1,"GATE_OUT"=>2,"WAIT_OUTSIDE"=>3];
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

    protected $dates = ['created_at', 'updated_at', 'gate_in_date_time','gate_out_date_time'];

    public function Vehicle_Type()
    {
        return $this->hasOne(Vehicle_Type::class,'id','vehicle_type_id');
    }

    public function Vehicle_Capacity()
    {
        return $this->hasOne(Vehicle_Capacity::class,'id','vehicle_capacity_id');
    }

    public function Vehicle_Body_Type()
    {
        return $this->hasOne(Vehicle_Body_Type::class,'id','vehicle_body_type_id');
    }


    public function scopeParkingstatus($query)
    {
        return $query->where('parking_status','3')->orWhere('parking_status','2')->orderBy('id', 'DESC');
    }

    public function scopeGate_in_status($query)
    {
        return $query->where('parking_status','1')->orderBy('id', 'DESC');
    }
}
