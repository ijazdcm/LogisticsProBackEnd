<?php

namespace App\Http\Requests\DefectType;

use Illuminate\Foundation\Http\FormRequest;

class DefectTypeStoreRequest extends FormRequest
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
            "defect_type"=>['required']
        ];
    }
}
