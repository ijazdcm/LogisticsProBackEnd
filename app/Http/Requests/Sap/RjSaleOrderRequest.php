<?php

namespace App\Http\Requests\Sap;

use Illuminate\Foundation\Http\FormRequest;

class RjSaleOrderRequest extends FormRequest
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
            "kunnr" => ['required'],
            "netwr" => ['required'],
            "Tripsheet" => ['required'],
            "matnr" => ['required'],
            "HSN_SAC" => ['required'],
        ];
    }
}
