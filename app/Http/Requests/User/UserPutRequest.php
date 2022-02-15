<?php

namespace App\Http\Requests\User;

use App\Helper\File\FileHelper;
use Illuminate\Foundation\Http\FormRequest;

class UserPutRequest extends FormRequest
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
            'username'=>['required'],
            'email'=>['required','email'],
            'password'=>['sometimes','required'],
            'mobile_no'=>['required','numeric','digits:10'],
            'photo'=>['sometimes','required','mimes:jpeg,jpg','max:5000'],
            'serial_no'=>['required'],
            'division_id'=>['required','exists:divisions,id'],
            'department_id'=>['required','exists:departments,id'],
            'designation_id'=>['required','exists:designations,id'],
            'location_id'=>['required','exists:locations,id'],
            'page_permissions'=>['required'],
        ];

    }


}
