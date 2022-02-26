<?php

namespace App\Http\Requests\Sheds;

use App\Helper\File\FileHelper;
use App\Models\Shed\Shed_Info;
use Illuminate\Foundation\Http\FormRequest;

class ShedStoreRequest extends FormRequest
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
        if(request()->isMethod('put'))
        {
            if(request()->hasFile('shed_owner_photo'))
            {
                $file_validation_shed_owner_photo="required|mimes:png,jpg,jpeg|max:5000";
            }
            else{

                $file_validation_shed_owner_photo="sometimes";
            }
        }
        return [
        "shed_type_id"=>['exists:shed__types,id'],
        "shed_name"=>['required'],
        "shed_owner_name"=>['required'],
        "shed_owner_phone_1"=>['required','numeric','digits:10'],
        "shed_owner_phone_2"=>['required','numeric','digits:10'],
        "shed_owner_address"=>['required'],
        "shed_owner_photo"=>['required', 'max:5000', 'mimes:png,jpg,jpeg,pdf'],
        "pan_number"=>['required','alpha_num'],
        "shed_adhar_number"=>['required','numeric','digits:12'],
        "gst_no"=>['required','alpha_num'],
        ];
    }


    public function validated(): array
    {
        if (true) {
            return array_merge(parent::validated(), ['shed_owner_photo' => (new FileHelper())->storeImage(request()->shed_owner_photo,Shed_Info::SHED_OWNER_PHOTO_PATH)]);
        }
        return parent::validated();
    }
}
