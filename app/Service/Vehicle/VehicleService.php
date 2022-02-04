<?php

namespace App\Service\Vehicle;

use App\Models\Vehicles\Vehicle_Info;

class VehicleService
{

    /**
     * assignVehicle function used to freeze the vehicle
     *
     * @param [type] $vehicle_id
     * @return void
     */
    public function assignVehicle($vehicle_id)
    {
        Vehicle_Info::where('id', $vehicle_id)->update(["vehicle_is_assigned" => 1]);
    }
    /**
     * unAssignVehicle function used to unFreeze the vehicle
     *
     * @param [type] $vehicle_id
     * @return void
     */
    public function unAssignVehicle($vehicle_id)
    {
        Vehicle_Info::where('id', $vehicle_id)->update(["vehicle_is_assigned" => 0]);
    }


    public function vehicleExits($vehicle_number):bool
    {
        if(Vehicle_Info::where('vehicle_number', $vehicle_number)->exists())
        {
            return 1;
        }
        return 0;
    }

}
