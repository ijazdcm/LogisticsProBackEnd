<?php

namespace App\Http\Requests\MaterialDescription;

use Illuminate\Foundation\Http\FormRequest;

class MaterialDescriptionRequest extends FormRequest
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

            "material_description" => "required|regex:/^[a-zA-Z ]+$/u|max:255|unique:material_description,material_description",
            "material_description_status" => ['sometimes', 'required'],
        ];
    }
}
