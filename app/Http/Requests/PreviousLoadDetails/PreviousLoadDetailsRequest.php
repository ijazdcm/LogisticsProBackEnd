<?php

namespace App\Http\Requests\PreviousLoadDetails;

use Illuminate\Foundation\Http\FormRequest;

class PreviousLoadDetailsRequest extends FormRequest
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
            "previous_load_details" => "required|regex:/^[a-zA-Z ]+$/u|max:255|unique:previous_load_details,previous_load_details"
        ];
    }
}
