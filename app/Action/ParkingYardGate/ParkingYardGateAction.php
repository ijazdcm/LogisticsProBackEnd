<?php

namespace App\Action\ParkingYardGate;

use App\Models\Driver\Driver_Info;
use App\Models\ParkingYardGate\Parking_Yard_Gate;
use App\Models\Vehicles\Vehicle_Info;
use Illuminate\Http\Request;

class ParkingYardGateAction
{

    public function handleParkingStatus(Request $request): array
    {
        if ($request->action_type == Parking_Yard_Gate::PKY_GATE_ACTION_TYPE['GATE_IN']) {
            return  array_merge($request->validated(), ["parking_status" => $request->action_type]);
        } else if ($request->action_type == Parking_Yard_Gate::PKY_GATE_ACTION_TYPE['GATE_OUT']) {
            return  array_merge($request->validated(), ["parking_status" => $request->action_type]);
        } else if ($request->action_type == Parking_Yard_Gate::PKY_GATE_ACTION_TYPE['WAIT_OUTSIDE']) {

            return  array_merge($request->validated(), ["parking_status" => $request->action_type]);
        }

        return  [];
    }

    public function handleGateEntry(Request $request)
    {
        if ($request->vehicle_type_id == Parking_Yard_Gate::VEHICLE_VALIDATION_IDS['OWN'] || $request->vehicle_type_id == Parking_Yard_Gate::VEHICLE_VALIDATION_IDS['CONTRACT']) {
            $this->assignDriver($request->driver_id);
            $this->assignVehicle($request->vehicle_id);
        }
    }

    private function assignDriver($driverId)
    {
        Driver_Info::where('id', $driverId)->update(["driver_is_assigned" => 1]);
    }

    private function assignVehicle($vehicleId)
    {
        Vehicle_Info::where('id', $vehicleId)->update(["vehicle_is_assigned" => 1]);
    }
}
