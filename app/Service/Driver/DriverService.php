<?php
namespace App\Service\Driver;

use App\Models\Driver\Driver_Info;

class DriverService
{



    /**
     * assignDriver function used to freeze the drive
     *
     * @param [type] $driver_id
     * @return void
     */
    public function assignDriver($driver_id)
    {
        Driver_Info::where('id', $driver_id)->update(["driver_is_assigned" => 1]);
    }

    /**
     * unAssignDriver function used to unFreeze the drive
     *
     * @param [type] $driver_id
     * @return void
     */

    public function unAssignDriver($driver_id)
    {
        Driver_Info::where('id', $driver_id)->update(["driver_is_assigned" => 0]);
    }


    /**
     * getDriverInfo function used to get the single driver info
     *
     * @param [type] $driver_id
     * @return Driver_Info
     */


    public function getDriverInfo($driver_id):Driver_Info
    {
       return  Driver_Info::where('id', $driver_id)->first();
    }
}
