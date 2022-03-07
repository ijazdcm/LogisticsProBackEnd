<?php

namespace App\Http\Requests\Location;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LocationUpdateRequest extends FormRequest
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
            "location_name" => "required|regex:/^[a-zA-Z]+$/",
            "location_code" => "required|regex:/^[0-9]{4}$/",
            "location_alpha_code" => "required|regex:/^[A-Z]$/u"
        ];
    }
}
