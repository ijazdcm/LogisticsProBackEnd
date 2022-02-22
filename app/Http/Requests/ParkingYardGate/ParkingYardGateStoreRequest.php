<?php

namespace App\Http\Requests\ParkingYardGate;

use App\Helper\File\FileHelper;
use App\Models\ParkingYardGate\Parking_Yard_Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class ParkingYardGateStoreRequest extends FormRequest
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
            "vehicle_type_id"=>['required'],
            "vehicle_id"=>[Rule::requiredIf(function ()  {
                return  ($this->vehicle_type_id==Parking_Yard_Gate::VEHICLE_VALIDATION_IDS["OWN"]||$this->vehicle_type_id==Parking_Yard_Gate::VEHICLE_VALIDATION_IDS["CONTRACT"])?true:false;
            })],
            "driver_id"=>[Rule::requiredIf(function ()  {
                return  ($this->vehicle_type_id==Parking_Yard_Gate::VEHICLE_VALIDATION_IDS["OWN"]||$this->vehicle_type_id==Parking_Yard_Gate::VEHICLE_VALIDATION_IDS["CONTRACT"])?true:false;
            })],
            "odometer_km"=>[Rule::requiredIf(function ()  {
                return  ($this->vehicle_type_id==Parking_Yard_Gate::VEHICLE_VALIDATION_IDS["OWN"]||$this->vehicle_type_id==Parking_Yard_Gate::VEHICLE_VALIDATION_IDS["CONTRACT"])?true:false;
            })],
            "odometer_photo"=>[Rule::requiredIf(function ()  {
                return  ($this->vehicle_type_id==Parking_Yard_Gate::VEHICLE_VALIDATION_IDS["OWN"]||$this->vehicle_type_id==Parking_Yard_Gate::VEHICLE_VALIDATION_IDS["CONTRACT"])?true:false;
            }),'mimes:jpeg,jpg','max:5000'],
            "vehicle_number"=>['required'],
            "vehicle_capacity_id"=>[Rule::requiredIf(function ()  {
                return  ($this->vehicle_type_id==Parking_Yard_Gate::VEHICLE_VALIDATION_IDS["OWN"]||$this->vehicle_type_id==Parking_Yard_Gate::VEHICLE_VALIDATION_IDS["CONTRACT"])?true:false;
            })],
            "driver_name"=>['required'],
            "driver_contact_number"=>['required','digits:10'],
            "vehicle_body_type_id"=>[Rule::requiredIf(function ()  {
                return  ($this->vehicle_type_id==Parking_Yard_Gate::VEHICLE_VALIDATION_IDS["HIRE"]||$this->vehicle_type_id==Parking_Yard_Gate::VEHICLE_VALIDATION_IDS["PARTY"])?true:false;
            })],
            "party_name"=>[Rule::requiredIf(function ()  {
                return  ($this->vehicle_type_id==Parking_Yard_Gate::VEHICLE_VALIDATION_IDS["PARTY"])?true:false;
            })],
            "action_type"=>['required'],
            "remarks"=>['']
        ];
    }

    public function validated(): array
    {
        if ($this->vehicle_type_id==Parking_Yard_Gate::VEHICLE_VALIDATION_IDS["OWN"]||$this->vehicle_type_id==Parking_Yard_Gate::VEHICLE_VALIDATION_IDS["CONTRACT"]) {
            return array_merge(parent::validated(), ['odometer_photo' => (new FileHelper())->storeImage(request()->odometer_photo,Parking_Yard_Gate::ODOMETER_PHOTO_PATH)]);
        }
        else{
            return array_merge(parent::validated(), ['vendor_creation_status' => '0']);
        }
        return parent::validated();
    }
}
