<?php
namespace App\Helper\TripSheet;

use App\Models\TripSheet\TripSheet;
use Carbon\Carbon;
use DateTime;

class TripSheetHelper
{

    public static function generateTripSheetNo($vehicle_type_id, $vehicle_location_id): string
    {

        $current_date_time = new DateTime();

        $date_sequence = $current_date_time->format("dmy");

        $vehicle_code = TripSheet::VEHICLE_CODE_BY_TYPE[$vehicle_type_id];

        $location_code = (string)$vehicle_location_id;

        //section generate the sequence of running number of trip sheet

        $lastTripSheetId = TripSheet::orderBy('created_at', 'desc')->first();

        if (!$lastTripSheetId)
            // We get here if there is no TripSheet at all
            // If there is no Trip sheet number set it to 0, which will be 1 at the end.

            $number = 0;
        else
            $number = substr($lastTripSheetId->trip_sheet_no, 8);


        return $vehicle_code . $location_code .$date_sequence. sprintf('%03d', intval($number) + 1);



    }

}
