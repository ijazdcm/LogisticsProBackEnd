<?php

namespace App\Http\Controllers\VehicleMaintenance;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleMaintenance\VehicleMaintenanceRequest;
use App\Http\Resources\ParkingYardGate\ParkingYardGateResource;
use App\Models\ParkingYardGate\Parking_Yard_Gate;
use App\Models\Vehicles\Vehicle_Maintance;
use App\Service\ParkingYardGate\ParkingYardGateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\VehicleMaintenance\VehicleMaintenanceResource;
use App\Models\Vehicles\vehicle_maintenance_type;
use App\Service\Driver\DriverService;
use Illuminate\Support\Facades\Log;

class VehicleMaintenanceMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $parking_yard_gate = Parking_Yard_Gate::with('Vehicle_Type')
            ->gate_in_status()
            ->get();

        return ParkingYardGateResource::collection($parking_yard_gate);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleMaintenanceRequest $request)
    {
        DB::transaction(function () use ($request) {

            if ($request->vehicle_maintenance_status == Vehicle_Maintance::VEHICLE_MAINTENANCE_PASSED) {


                if ($request->driver_id && $request->old_driver_id) {
                    /*
                     this block only executed when above params passed on request
                     */

                    //un-assign the locked driver
                    (new DriverService())->unAssignDriver($request->old_driver_id);

                    //assign the new driver
                    (new DriverService())->assignDriver($request->driver_id);

                    //assign the new driver to vehicle
                    (new ParkingYardGateService())->assignNewDriverToVehicle($request->vehicle_id, $request->driver_id);
                }

                Vehicle_Maintance::create($request->validated());
                Parking_Yard_Gate::where('vehicle_id', (int)$request->vehicle_id)->update(['maintenance_status'=>Vehicle_Maintance::latest()->first()->id]);
            }
            else {

                Vehicle_Maintance::create($request->validated());

                //this service make vehicle on parking Yard table to gateOut status

                (new ParkingYardGateService())->gateOutVehicle($request->vehicle_id);

            }

        });

        return VehicleMaintenanceResource::make($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $maintenance = Vehicle_Maintance::where('vehicle_maintenance_status', 1)
        ->where('id', $id)
        ->first();

    if ($maintenance) {
        return new VehicleMaintenanceResource($maintenance->load('maintenance_typ'));
    }
    return response()->json(['message' => 'maintenance Not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    //
    }


}
