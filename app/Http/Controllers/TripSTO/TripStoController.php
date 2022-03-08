<?php

namespace App\Http\Controllers\TripSTO;

use App\Http\Controllers\Controller;
use App\Http\Resources\ParkingYardGate\ParkingYardGateResource;
use App\Models\ParkingYardGate\Parking_Yard_Gate;


use App\Models\Vendors\Vendor_Info;

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

        Parking_Yard_Gate::where('vehicle_id', $id)
            ->update(["trip_sto_status" => "1", "vendor_creation_status" => "1"]);

        return response('', 204)->header('Content-Type', 'application/json');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        Vendor_Info::create([
            "vehicle_id" => $request->vehicle_id,
            "shed_id" => $request->shed_id,
            "owner_name" => $request->owner_name,
            "owner_number" => $request->owner_number,
            "pan_card_number" => $request->pan_number,
            "remarks" => $request->remarks,
        ]);


        Parking_Yard_Gate::where('vehicle_id', $request->vehicle_id)
            ->update(["trip_sto_status" => "1", "vendor_creation_status" => "1"]);

        return response()->json(['message' => 'Updated'], 200);
    }
}
