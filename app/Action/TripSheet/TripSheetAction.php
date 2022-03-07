<?php
namespace App\Action\TripSheet;

use App\Models\TripSheet\TripSheet;
use App\Service\Driver\DriverService;
use Illuminate\Http\Request;
use App\Service\ParkingYardGate\ParkingYardGateService;


class TripSheetAction
{



    public function CreateTripSheetOwnAndContract(Request $request, string $trip_sheet_no): bool
    {

        //checking if the driver is changed or not

        if ((new ParkingYardGateService())->checkDriverChanged($request->vehicle_id, $request->driver_id)) {

            (new ParkingYardGateService())->unAssignDriverByVehicleId((string)$request->vehicle_id);

            (new DriverService())->assignDriver($request->driver_id);

            (new ParkingYardGateService())->assignNewDriverToVehicle($request->vehicle_id, $request->driver_id);
        }

        $trip_sheet = new TripSheet();

        $trip_sheet->trip_sheet_no = $trip_sheet_no;
        $trip_sheet->vehicle_id = $request->vehicle_id;
        $trip_sheet->driver_id = $request->driver_id;
        $trip_sheet->to_divison = $request->division_id;
        $trip_sheet->trip_advance_eligiblity = $request->trip_advance_eligiblity;
        $trip_sheet->advance_amount = $request->advance_amount;
        $trip_sheet->purpose = $request->purpose;
        $trip_sheet->expected_date_time = $request->expected_date_time;
        $trip_sheet->expected_return_date_time = $request->expected_return_date_time;
        $trip_sheet->status = '0';
        $trip_sheet->remarks = $request->remarks;

        return ($trip_sheet->save()) ? true : false;
    }


    public function CreateTripSheetHire(Request $request, string $trip_sheet_no): bool
    {
        $trip_sheet = new TripSheet();

        $trip_sheet->trip_sheet_no = $trip_sheet_no;
        $trip_sheet->vehicle_id = $request->vehicle_id;
        $trip_sheet->to_divison = $request->division_id;
        $trip_sheet->trip_advance_eligiblity = $request->trip_advance_eligiblity;
        $trip_sheet->advance_amount = $request->advance_amount;
        $trip_sheet->advance_payment_diesel = $request->advance_payment_diesel;
        $trip_sheet->purpose = $request->purpose;
        $trip_sheet->vehicle_sourced_by = $request->vehicle_sourced_by;
        $trip_sheet->expected_date_time = $request->expected_date_time;
        $trip_sheet->freight_rate_per_tone = $request->freight_rate_per_tone;
        $trip_sheet->remarks = $request->remarks;
        $trip_sheet->status = '0';

        return ($trip_sheet->save()) ? true : false;
    }


}
