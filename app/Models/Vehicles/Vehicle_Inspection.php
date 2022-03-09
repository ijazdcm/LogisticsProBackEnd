<?php

namespace App\Models\Vehicles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vehicles\Vehicle_Info;
use App\Models\Driver\Driver_Info;
use App\Models\ParkingYardGate\Parking_Yard_Gate;

class Vehicle_Inspection extends Model
{
    use HasFactory;

    public const VEHICLE_INSPECTION_PASSED = '1';

    protected $table = "vehicle__inspections";

    protected $fillable = [
        "vehicle_id",
        "truck_clean",
        "bad_smell",
        "insect_vevils_presence",
        "tarpaulin_srf",
        "tarpaulin_non_srf",
        "insect_vevils_presence_in_tar",
        "truck_platform",
        "previous_load_details",
        "vehicle_fit_for_loading",
        "remarks",
        "vehicle_inspection_status",
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
