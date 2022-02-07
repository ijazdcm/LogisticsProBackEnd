<?php

namespace App\Action\ParkingYardGate;

use App\Models\Driver\Driver_Info;
use App\Models\ParkingYardGate\Parking_Yard_Gate;
use App\Models\Vehicles\Vehicle_Info;
use Illuminate\Http\Request;
use App\Service\Driver\DriverService;
use App\Service\Vehicle\VehicleService;

class ParkingYardGateAction
{

    public function handleParkingStatus(Request $request): array
    {
        if ($request->action_type == Parking_Yard_Gate::PKY_GATE_ACTION_TYPE['GATE_IN']) {

            return array_merge($request->validated(), ["parking_status" => $request->action_type]);
        }
        else if ($request->action_type == Parking_Yard_Gate::PKY_GATE_ACTION_TYPE['GATE_OUT']) {
            return array_merge($request->validated(), ["parking_status" => $request->action_type]);
        }
        else if ($request->action_type == Parking_Yard_Gate::PKY_GATE_ACTION_TYPE['WAIT_OUTSIDE']) {

            return array_merge($request->validated(), ["parking_status" => $request->action_type]);
        }

        return [];
    }

    public function handleGateEntry(Request $request)
    {

        if ($request->vehicle_type_id == Parking_Yard_Gate::VEHICLE_VALIDATION_IDS['OWN'] || $request->vehicle_type_id == Parking_Yard_Gate::VEHICLE_VALIDATION_IDS['CONTRACT']) {

            (new DriverService())->assignDriver($request->driver_id);

            (new VehicleService())->assignVehicle($request->vehicle_id);
        }
        else {
            //checking on database if already a Hire or Party Not Vehicle Exist
            if(!(new VehicleService())->vehicleExits($request->vehicle_number))
            {
                //if not exits creating the new record in Vehicle_info table
                Vehicle_Info::create([
                    "vehicle_type_id"=>$request->vehicle_type_id,
                    "vehicle_number"=>$request->vehicle_number,
                    "vehicle_capacity_id"=>$request->vehicle_capacity_id,
                    "vehicle_body_type_id"=>$request->vehicle_body_type_id,
                ]);

            }

        }

    }


    public function handleVehicleId(array $validated, Vehicle_Info $vehicle_Info):array
    {

        return array_merge($validated,["vehicle_id"=>$vehicle_Info->id]);

    }
}
