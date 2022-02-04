<?php

namespace App\Http\Controllers\ParkingYardGate;

use App\Action\ParkingYardGate\ParkingYardGateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\ParkingYardGate\ParkingYardGateStoreRequest;
use App\Models\ParkingYardGate\Parking_Yard_Gate;
use Illuminate\Http\Request;
use App\Http\Resources\ParkingYardGate\ParkingYardGateResource;
use App\Models\Driver\Driver_Info;
use App\Models\Vehicles\Vehicle_Info;
use Illuminate\Support\Facades\DB;

class ParkingYardGateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $parking_yard_gate = Parking_Yard_Gate::with('Vehicle_Type')
            ->parkingstatus()
            ->get();

        return ParkingYardGateResource::collection($parking_yard_gate);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParkingYardGateStoreRequest $request, ParkingYardGateAction $gateAction)
    {


        $validated = $gateAction->handleParkingStatus($request);
        DB::transaction(function () use ($gateAction, $request, $validated) {

            $gateAction->handleGateEntry($request);

            //getting the new added vehicle Id to insert into parkingYard gate
            $validated=$gateAction->handleVehicleId($validated,Vehicle_Info::latest()->first());

            Parking_Yard_Gate::create($validated);
        });

        return ParkingYardGateResource::make(Parking_Yard_Gate::latest()->first());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parkingYardVehicle = Parking_Yard_Gate::with('Vehicle_Type')
            ->gate_in_status()
            ->where('id', $id)
            ->first();

        if ($parkingYardVehicle) {

            return ParkingYardGateResource::make($parkingYardVehicle);
        }
        return response()->json(['message' => 'Truck Not Found In Gate'], 404);
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
