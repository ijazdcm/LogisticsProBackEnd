<?php

namespace App\Http\Requests\Sheds;

use App\Helper\File\FileHelper;
use Illuminate\Foundation\Http\FormRequest;

class ShedPutRequest extends FormRequest
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
        "shed_type_id"=>['required','exists:shed__types,id'],
        "shed_name"=>['required'],
        "shed_owner_name"=>['required'],
        "shed_owner_phone_1"=>['required','numeric','digits:10'],
        "shed_owner_phone_2"=>['required','numeric','digits:10'],
        "shed_owner_address"=>['required'],
        "shed_owner_photo"=>['sometimes','required','mimes:jpeg,jpg'],
        "pan_number"=>['required','alpha_num'],
        "shed_adhar_number"=>['required','numeric','digits:14'],
        "gst_no"=>['required','alpha_num'],
        ];
    }

}
