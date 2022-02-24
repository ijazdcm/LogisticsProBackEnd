<?php

namespace App\Http\Requests\Uom;

use Illuminate\Foundation\Http\FormRequest;

class UomRequest extends FormRequest
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
            "uom" => "required|regex:/^[a-zA-Z]+$/u|max:255|unique:uom,",
            "uom_status" =>  ['sometimes', 'required'],
        ];
    }
}
