<?php

namespace App\Models\Vehicles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle_Maintance extends Model
{
    use HasFactory;

    public const VEHICLE_MAINTENANCE_PASSED='1';

    protected $table="vehicle__maintances";

    protected $fillable=[
        "vehicle_id",
        "driver_id",
        "maintenance_typ",
        "maintenance_by",
        "work_order",
        "vendor_id",
        "maintenance_start_datetime",
        "maintenance_end_datetime",
        "closing_odometer_km",
        "vehicle_maintenance_status",
        "remarks",
        "created_by",
    ];
    public function Vehicle_Info()
    {
        return $this->hasOne(Vehicle_Info::class, 'id', 'vehicle_id')->with('Vehicle_Type');
    }
    public function Vehicle_Type()
    {
        return $this->hasOne(Vehicle_Type::class, 'id', 'vehicle_type_id');
    }
    public function ParkingYard_Info()
    {
        return $this->hasOne(Parking_Yard_Gate::class, 'vehicle_id', 'vehicle_id')->with('Vehicle_Capacity');
    }
}
