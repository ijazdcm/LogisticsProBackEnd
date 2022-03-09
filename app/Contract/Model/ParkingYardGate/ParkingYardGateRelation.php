<?php

namespace App\Contract\Model\ParkingYardGate;

use App\Models\Driver\Driver_Info;
use App\Models\Location\Location;
use App\Models\Vehicles\Vehicle_Body_Type;
use App\Models\Vehicles\Vehicle_Capacity;
use App\Models\Vehicles\Vehicle_Document;
use App\Models\Vehicles\Vehicle_Info;
use App\Models\Vehicles\Vehicle_Inspection;
use App\Models\Vehicles\Vehicle_Type;

trait ParkingYardGateRelation
{


    public function Vehicle_Info()
    {
        return $this->hasOne(Vehicle_Info::class, 'id', 'vehicle_id');
    }
    public function Vehicle_Type()
    {
        return $this->hasOne(Vehicle_Type::class, 'id', 'vehicle_type_id');
    }

    public function Vehicle_Inspection()
    {
        return $this->hasOne(Vehicle_Inspection::class, 'vehicle_id', 'vehicle_id');
    }

    public function Vehicle_Capacity()
    {
        return $this->hasOne(Vehicle_Capacity::class, 'id', 'vehicle_capacity_id');
    }


    public function Vehicle_Location()
    {
        return $this->hasOne(Location::class, 'id', 'vehicle_location_id');
    }

    public function Vehicle_Inspection_Trip()
    {
        return $this->hasOne(Vehicle_Inspection::class, 'id', 'vehicle_inspection_id');
    }

    public function Driver_Info()
    {
        return $this->hasOne(Driver_Info::class, 'id', 'driver_id');
    }

    public function Vehicle_Body_Type()
    {
        return $this->hasOne(Vehicle_Body_Type::class, 'id', 'vehicle_body_type_id');
    }

    public function Vehicle_Document()
    {
        return $this->hasOne(Vehicle_Document::class, 'vehicle_id', 'vehicle_id');
    }


    /*this is added by saravana sai to take document verification info to show
    / Freight rate per ton
    */
    public function Vehicle_Documents()
    {
        return $this->hasOne(Vehicle_Document::class, 'vehicle_inspection_id', 'vehicle_inspection_id');
    }

}
