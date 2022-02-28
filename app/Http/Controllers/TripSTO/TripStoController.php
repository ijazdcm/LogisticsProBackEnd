<?php

namespace App\Http\Controllers\TripSTO;

use App\Http\Controllers\Controller;
use App\Http\Resources\ParkingYardGate\ParkingYardGateResource;
use App\Models\ParkingYardGate\Parking_Yard_Gate;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;

class TripStoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $trip_sto_gate = Parking_Yard_Gate::with('Vehicle_Type')
            ->trip_sto_status()
            ->get();

        return ParkingYardGateResource::collection($trip_sto_gate);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trip_sto_vehicle = Parking_Yard_Gate::where('vehicle_id', $id)->first();
        if ($trip_sto_vehicle) {
            $trip_sto_vehicle->update([$trip_sto_vehicle->trip_sto_status = 1]);
            return response('', 204)->header('Content-Type', 'application/json');
        } else {
            return response()->json(['message' => 'Truck Not found'], 404);
        }
    }
}
