<?php

namespace App\Http\Controllers\TripSTO;

use App\Http\Controllers\Controller;
use App\Http\Resources\ParkingYardGate\ParkingYardGateResource;
use App\Models\ParkingYardGate\Parking_Yard_Gate;
use App\Models\Vehicles\Vehicle_Document;

use App\Models\Vehicles\Vehicle_Inspection;

use App\Models\Vendors\Vendor_Info;
use App\Service\ParkingYardGate\ParkingYardGateService;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->document_status == Vehicle_Document::VEHICLE_DOCUMENTATION_PASSED) {
            $vendor_status = 1;
        } else {
            $vendor_status = 0;
            (new ParkingYardGateService())->gateOutVehicle($request->vehicle_id);
        }


//         $vendor_info = Vendor_Info::create([
//             "vehicle_id" => $request->vehicle_id,
//             "shed_id" => $request->shed_id,
//             "vendor_code" => $request->vendor_code,
//             "owner_name" => $request->owner_name,
//             "owner_number" => $request->owner_number,
//             "pan_card_number" => $request->pan_number,
//             "aadhar_card_number" => $request->aadhar_number,
//             "bank_acc_number" => $request->bank_acc_number,
//             "vendor_status" => $vendor_status,
//             "remarks" => $request->remarks,

        $vendor_info = Vendor_Info::where('vehicle_id', $request->vehicle_id)->first();

        if (!$vendor_info) {

            $vendor_info = Vendor_Info::create([
                "vehicle_id" => $request->vehicle_id,
                "shed_id" => $request->shed_id,
                "vendor_code" => $request->vendor_code,
                "owner_name" => $request->owner_name,
                "owner_number" => $request->owner_number,
                "pan_card_number" => $request->pan_number,
                "aadhar_card_number" => $request->aadhar_number,
                "bank_acc_number" => $request->bank_acc_number,
                "vendor_status" => $vendor_status,
                "remarks" => $request->remarks,
            ]);
        } else {
            return response()->json(['message' => 'Vendor Already Exists'], 404);
        }

        Vehicle_Inspection::create([
            "vehicle_id" => $request->vehicle_id,
            "truck_clean" => 1,
            "bad_smell" => 1,
            "insect_vevils_presence" => 1,
            "tarpaulin_srf" => 1,
            "tarpaulin_non_srf" => 1,
            "insect_vevils_presence_in_tar" => 1,
            "truck_platform" => 1,
            "previous_load_details" => 1,
            "vehicle_fit_for_loading" => 1,
            "remarks" => 'RMSTO HIRE',
            "vehicle_inspection_status" => 1,
        ]);

        $vendor_id = Vendor_Info::select('id')->latest('id')->first();

        $vehicle_document = Vehicle_Document::create([
            "vehicle_id" => $request->vehicle_id,
            "vendor_id" => $vendor_id->id,
            "shed_id" => $request->shed_id,
            "vendor_flag" => ($request->vendor_code != 0 ? 1 : 0),
            "document_status" => $request->document_status,
            "remarks" => $request->remarks,
        ]);

        if (!$vehicle_document) {
            return response()->json(['message' => 'Vendor Not Found'], 404);
        }

        $trip_sto_vehicle = Parking_Yard_Gate::where('vehicle_id', $request->vehicle_id)->first();
        if ($trip_sto_vehicle) {
            $trip_sto_vehicle->update([$trip_sto_vehicle->trip_sto_status = 1]);
            // return response('', 204)->header('Content-Type', 'application/json');

        } else {
            return response()->json(['message' => 'Truck Not found'], 404);
        }


        Parking_Yard_Gate::where('vehicle_id', $request->vehicle_id)->update(['document_verification_status' => $request->document_status]);

        return response()->json(['message' => 'Updated'], 200);
    }
}
