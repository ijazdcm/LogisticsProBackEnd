<?php

namespace App\Http\Requests\Division;

use Illuminate\Foundation\Http\FormRequest;

class DivisionRequest extends FormRequest
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
            "division_name" => "required|regex:/^[a-zA-Z ]+$/u|max:255|unique:divisions,division_name",
            "division_code" => "required|regex:/^[0-9]{8}$/u|unique:divisions,division_code"
        ];
    }
}
