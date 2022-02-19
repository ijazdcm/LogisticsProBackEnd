<?php
namespace App\Action\TripSheet;

use App\Models\TripSheet\TripSheet;
use Illuminate\Http\Request;


class TripSheetAction{



    public function CreateTripSheetOwnAndContract(Request $request,string $trip_sheet_no):bool
    {
            $trip_sheet= new TripSheet();

            $trip_sheet->trip_sheet_no=$trip_sheet_no;
            $trip_sheet->vehicle_id=$request->vehicle_id;
            $trip_sheet->driver_id=$request->driver_id;
            $trip_sheet->division_id=$request->division_id;
            $trip_sheet->trip_advance_eligiblity=$request->trip_advance_eligiblity;
            $trip_sheet->advance_amount=$request->advance_amount;
            $trip_sheet->purpose=$request->purpose;
            $trip_sheet->expected_date_time=$request->expected_date_time;
            $trip_sheet->expected_return_date_time=$request->expected_return_date_time;
            $trip_sheet->status='0';

            return ($trip_sheet->save())?true:false;
    }





}
