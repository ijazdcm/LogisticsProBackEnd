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

        $shed_owner_photo="sometimes";
        if(request()->hasFile('shed_owner_photo'))
        {
           $shed_owner_photo="required";
        }



        return [
        "shed_type_id"=>['required','exists:shed__types,id'],
        "shed_name"=>['required'],
        "shed_owner_name"=>['required'],
        "shed_owner_phone_1"=>['required','numeric','digits:10'],
        "shed_owner_phone_2"=>['required','numeric','digits:10'],
        "shed_owner_address"=>['required'],
        "shed_owner_photo"=>[$shed_owner_photo,'mimes:jpeg,jpg','max:5000'],
        "pan_number"=>['required','alpha_num'],
        "gst_no"=>['required','alpha_num'],
        ];
    }

}
