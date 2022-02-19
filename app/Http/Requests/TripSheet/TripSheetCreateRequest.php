<?php

namespace App\Http\Requests\TripSheet;

use Illuminate\Foundation\Http\FormRequest;

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
    public function rules()
    {
        return [
            "vehicle_id"=>['required','exists:vehicle__infos,id'],
            "vehicle_type_id"=>['required','exists:vehicle__types,id'],
            "driver_id"=>['required','exists:driver__infos,id'],
            "division_id"=>['required','exists:divisions,id'],
            "trip_advance_eligiblity"=>['required'],
            "advance_amount"=>['required_if:trip_advance_eligiblity,1'],
            "purpose"=>['required'],
            "expected_date_time"=>['required'],
            "expected_return_date_time"=>['required'],
            "freight_rate_per_tone"=>['required_if:vehicle_type_id,3',],
            "advance_payment_bank"=>['required_if:trip_advance_eligiblity,1'],
            "advance_payment_diesel"=>['required_if:trip_advance_eligiblity,1'],
            "remarks"=>['sometimes'],
        ];
    }
}
