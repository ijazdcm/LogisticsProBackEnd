<?php

namespace App\Http\Controllers\VehicleInspection;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleInspection\VehicleInspectionRequest;
use App\Http\Resources\ParkingYardGate\ParkingYardGateResource;
use App\Models\ParkingYardGate\Parking_Yard_Gate;
use App\Models\Vehicles\Vehicle_Inspection;
use App\Service\ParkingYardGate\ParkingYardGateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\VehicleInspection\VehicleInspectionResource;
use App\Service\Driver\DriverService;
use Illuminate\Support\Facades\Log;

class VehicleInspectionMasterController extends Controller
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
    public function store(VehicleInspectionRequest $request)
    {
        DB::transaction(function () use ($request) {

            if ($request->vehicle_inspection_status == Vehicle_Inspection::VEHICLE_INSPECTION_PASSED) {


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

                Parking_Yard_Gate::where('vehicle_id', (int)$request->vehicle_id)->update(['vehicle_inspection_status'=>'1','vehicle_inspection_id'=>Vehicle_Inspection::latest()->first()->id]);
                Vehicle_Inspection::create($request->validated());
            } else {

                Vehicle_Inspection::create($request->validated());

                //this service make vehicle on parking Yard table to gateOut status

                (new ParkingYardGateService())->gateOutVehicle($request->vehicle_id);
            }
        });

        return VehicleInspectionResource::make($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
