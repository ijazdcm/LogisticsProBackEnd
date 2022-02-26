<?php

namespace App\Http\Requests\RejectionReason;

use Illuminate\Foundation\Http\FormRequest;

class RejectionReasonRequest extends FormRequest
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
            "rejection_reason" => "required|regex:/^[a-zA-Z ]+$/u|max:255|unique:rejection_reasons,rejection_reason"
            
        ];
    }
}
