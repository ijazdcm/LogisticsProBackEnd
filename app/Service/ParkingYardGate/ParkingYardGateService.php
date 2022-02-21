<?php
namespace App\Service\ParkingYardGate;

use App\Models\ParkingYardGate\Parking_Yard_Gate;
use App\Service\Driver\DriverService;

class ParkingYardGateService
{



    /**
     * gateOutVehicle function used to make vehicle to Gate-Out
     *
     * @param [type] $vehicle_id
     * @return void
     */
    public function gateOutVehicle($vehicle_id)
    {
        Parking_Yard_Gate::where('vehicle_id',$vehicle_id)
        ->where('parking_status','1')
        ->update(['parking_status'=>'2']);
    }


    public function assignNewDriverToVehicle($vehicle_id,$driver_id)
    {
        Parking_Yard_Gate::where('vehicle_id',$vehicle_id)
        ->update(['driver_id'=>$driver_id]);

        $this->updateDriverNameOnParkingYardGate($vehicle_id,$driver_id);
    }


    private function updateDriverNameOnParkingYardGate($vehicle_id,$driver_id)
    {
        $driver_info=(new DriverService())->getDriverInfo($driver_id);

        Parking_Yard_Gate::where('vehicle_id',$vehicle_id)
        ->update(['driver_name'=>$driver_info->driver_name]);
    }



    public function checkDriverChanged($vehicle_id,$driver_id):bool
    {

        $vehicle_info=Parking_Yard_Gate::where('vehicle_id',$vehicle_id)->first();

        return ($vehicle_info->driver_id==$driver_id)?false:true;
    }



    public function unAssignDriverByVehicleId($vehicle_id)
    {
        $vehicle_info=Parking_Yard_Gate::where('vehicle_id',$vehicle_id)->first();

         (new DriverService())->unAssignDriver($vehicle_info->driver_id);

    }
}
