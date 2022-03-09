<?php

namespace App\Http\Controllers\TripSheet;

use App\Action\TripSheet\TripSheetAction;
use App\Helper\TripSheet\TripSheetHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\TripSheet\TripSheetCreateRequest;
use App\Http\Resources\ParkingYardGate\ParkingYardGateResource;
use Illuminate\Http\Request;
use App\Models\ParkingYardGate\Parking_Yard_Gate;
use App\Models\TripSheet\TripSheet;

class TripSheetMasterController extends Controller
{
    /**
     * this function get all the list of vehicles ready to
     * create trip-sheet form parking-yard-gate table
     */

    public function vehicleReadyToTrip()
    {
        $vehicle_ready_trip = Parking_Yard_Gate::with('Vehicle_Type')
            ->ready_to_load()
            ->get();

        return ParkingYardGateResource::collection($vehicle_ready_trip);
    }


    /**
     * this function get info of single vehicles ready to
     * create trip-sheet form parking-yard-gate table
     */

    public function singleVehicleInfoOnGate($id)
    {
        $vehicle_info = Parking_Yard_Gate::find($id);

        $vehicle_info_ready_to_trip = [];

        if ($vehicle_info->vehicle_type_id == Parking_Yard_Gate::VEHICLE_VALIDATION_IDS['OWN'] || $vehicle_info->vehicle_type_id == Parking_Yard_Gate::VEHICLE_VALIDATION_IDS['CONTRACT']) {

            $vehicle_info_ready_to_trip = Parking_Yard_Gate::Info_of_own_contract_vehicle_tripsheet()
            ->where('id', $id)
            ->first();
        }
        else if($vehicle_info->vehicle_type_id==Parking_Yard_Gate::VEHICLE_VALIDATION_IDS['HIRE'] && $vehicle_info->trip_sto_status!='1'){

            $vehicle_info_ready_to_trip = Parking_Yard_Gate::Info_of_hire_romsto_vehicle_tripsheet()
            ->where('id', $id)
            ->first();
        }
        else{

            $vehicle_info_ready_to_trip = Parking_Yard_Gate::Info_of_normal_vehicle_tripsheet()
            ->where('id', $id)
            ->first();
        }

        return ParkingYardGateResource::make($vehicle_info_ready_to_trip);

    }

     /**
     * this function create TripSheet for vehicle
     * @return array
     */
    public function createTripSheet(TripSheetCreateRequest $request,TripSheetAction $tripsheetaction)
    {

         $trip_sheet_no=TripSheetHelper::generateTripSheetNo($request->vehicle_type_id,$request->vehicle_location_id);


         switch($request->vehicle_type_id)
         {
             case TripSheet::VEHICLE_TYPE['OWN']:if($tripsheetaction->CreateTripSheetOwnAndContract($request,$trip_sheet_no))
             {
                 return $request;
             } break;
             case TripSheet::VEHICLE_TYPE['CONTRACT']:if($tripsheetaction->CreateTripSheetOwnAndContract($request,$trip_sheet_no))
             {
                 return $request;
             } break;
             case TripSheet::VEHICLE_TYPE['HIRE']:if($tripsheetaction->CreateTripSheetHire($request,$trip_sheet_no))
             {
                 return $request;
             } break;

             default:break;
         }



    }






}
