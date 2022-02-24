<?php

namespace App\Http\Requests\TripSheet;

use App\Models\TripSheet\TripSheet;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class TripSheetCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {


        if($request->vehicle_type_id==TripSheet::VEHICLE_TYPE['OWN']||$request->vehicle_type_id==TripSheet::VEHICLE_TYPE['CONTRACT'])
        {

            return [
                "vehicle_id"=>['required','exists:vehicle__infos,id'],
                "vehicle_type_id"=>['required','exists:vehicle__types,id'],
                "driver_id"=>['required','exists:driver__infos,id'],
                "division_id"=>['required','exists:divisions,id'],
                "trip_advance_eligiblity"=>['required'],
                "advance_amount"=>['required_if:trip_advance_eligiblity,1'],
                "purpose"=>['required'],
                "vehicle_sourced_by"=>['required_if:purpose,2'],
                "expected_date_time"=>['required'],
                "expected_return_date_time"=>['sometimes','required'],
                "freight_rate_per_tone"=>['required_if:vehicle_type_id,3',],
                "advance_payment_diesel"=>['sometimes','required_if:trip_advance_eligiblity,1'],

            ];

        }
        else{

            return [
                "vehicle_id"=>['required','exists:vehicle__infos,id'],
                "vehicle_type_id"=>['required','exists:vehicle__types,id'],
                "division_id"=>['required','exists:divisions,id'],
                "trip_advance_eligiblity"=>['required'],
                "advance_amount"=>['required_if:trip_advance_eligiblity,1'],
                "purpose"=>['required'],
                "vehicle_sourced_by"=>['required_if:purpose,2'],
                "expected_date_time"=>['required'],
                "freight_rate_per_tone"=>['required_if:vehicle_type_id,3',],
                "advance_payment_diesel"=>['sometimes','required_if:trip_advance_eligiblity,1'],

            ];
        }



    }
}
