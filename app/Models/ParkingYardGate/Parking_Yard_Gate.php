<?php

namespace App\Models\ParkingYardGate;

use App\Contract\Model\ParkingYardGate\ParkingYardGateContract;
use App\Models\Vendors\Vendor_Info;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Parking_Yard_Gate extends Model
{
    use HasFactory;
    use ParkingYardGateContract;

    /**
     * description:This VEHICLE_VALIDATION_IDS is used in validation part
     * to dynamically get a validation  rules
     *@param array VEHICLE_VALIDATION_IDS
     */
    public const VEHICLE_VALIDATION_IDS = ["OWN" => 1, "CONTRACT" => 2, "HIRE" => 3, "PARTY" => 4];

    public const ODOMETER_PHOTO_PATH = 'ParkingYardGate/OdometerPhoto/';

    /**
     * Undocumented variable
     *
     * @var string
     */
    public const PKY_GATE_ACTION_TYPE = ["GATE_IN" => 1, "GATE_OUT" => 2, "WAIT_OUTSIDE" => 3];
    protected $table = "parking__yard__gates";

    protected $fillable = [
        "vehicle_type_id",
        "vehicle_id",
        "vehicle_location_id",
        "driver_id",
        "odometer_km",
        "odometer_photo",
        "vehicle_number",
        "vehicle_capacity_id",
        "driver_name",
        "driver_contact_number",
        "vehicle_body_type_id",
        "vehicle_inspection_id",
        "party_name",
        "remarks",
        "parking_status",
        "maintenance_status",
        "trip_sto_status",
        "vendor_creation_status",
        "vehicle_inspection_status",
        "gate_in_date_time",
        "gate_out_date_time",
        "created_by",
    ];

    protected $dates = ['created_at', 'updated_at', 'gate_in_date_time', 'gate_out_date_time'];





    public function Vendor_Info()
    {
        return $this->hasOne(Vendor_Info::class, 'vehicle_id', 'vehicle_id');
    }




    public function scopeTrip_Sto_status($query)
    {
        return $query->where('parking_status', '1')
            ->where('vehicle_inspection_status', null)
            ->where('maintenance_status', null)
            ->where('vehicle_inspection_id', null)
            ->where('trip_sto_status', null)
            ->where('vehicle_type_id', '!=', 4)
            ->orderBy('id', 'DESC');
    }


    public function scopeInspectionStatus($query)
    {
        return $query->where('parking_status', '1')
            ->where('vehicle_inspection_status', '1')
            ->orderBy('id', 'DESC');
    }



    public function scopeMaintenanceStatus($query)
    {
        return $query->where('parking_status', '1')
            ->where('maintenance_status', '1')
            ->orderBy('id', 'DESC');
    }


    /**
     * Define model event callbacks.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->vehicle_location_id = (Auth::user()) ? Auth::user()->Location->id : 1;
        });
    }
}
