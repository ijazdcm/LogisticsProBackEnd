<?php

namespace App\Http\Requests\User;

use App\Helper\File\FileHelper;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserStoreRequest extends FormRequest
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
            'password'=>['required'],
            'mobile_no'=>['required','numeric','digits:10','unique:users,mobile_no'],
            'photo'=>['required','mimes:jpeg,jpg','max:5000'],
            'serial_no'=>['required'],
            'division_id'=>['required','exists:divisions,id'],
            'department_id'=>['required','exists:departments,id'],
            'designation_id'=>['required','exists:designations,id'],
            'location_id'=>['required','exists:locations,id'],
            'user_auto_id'=>['required','alpha_num'],
            'page_permissions'=>['required'],
        ];

    }

    public function validated(): array
    {
        if (true) {
            return array_merge(parent::validated(), ['photo' => (new FileHelper())->storeImage(request()->photo,User::USER_PHOTO_PATH),'password'=>Hash::make($this->password)]);
        }
        return parent::validated();
    }
}
