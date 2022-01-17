<?php

namespace App\Http\Requests\Vendors;

use App\Helper\File\FileHelper;
use App\Models\Vendors\Vendor_Info;
use Illuminate\Foundation\Http\FormRequest;

class VendorInfoStoreRequest extends FormRequest
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
            "shed_id"=>['required','exists:shed__infos,id'],
            "owner_name"=>['required'],
            "pan_card_number"=>['required'],
            "pan_card_attachment"=>['required','mimes:jpeg,jpg','max:5000'],
            "aadhar_card_number"=>['required'],
            "aadhar_card_copy"=>['required','mimes:jpeg,jpg','max:5000'],
            "license_copy"=>['required','mimes:jpeg,jpg','max:5000'],
            "rc_copy_front"=>['required','mimes:jpeg,jpg','max:5000'],
            "rc_copy_back"=>['required','mimes:jpeg,jpg','max:5000'],
            "insurance_copy"=>['required','mimes:jpeg,jpg','max:5000'],
            "transpoter_shed_sheet"=>['required','mimes:jpeg,jpg','max:5000'],
            "bank_pass_book_copy"=>['required','mimes:jpeg,jpg','max:5000'],
            "bank_name"=>['required'],
            "bank_branch"=>['required'],
            "bank_ifsc_Code"=>['required'],
            "bank_acc_number"=>['required'],
            "bank_acc_holder_name"=>['required'],
            "street"=>['required'],
            "area"=>['required'],
            "city"=>['required'],
            "district"=>['required'],
            "state"=>['required'],
            "postal_code"=>['required'],
            "region"=>['required'],
            "tds_decelration_form_front"=>['required','mimes:jpeg,jpg','max:5000'],
            "tds_decelration_form_back"=>['required','mimes:jpeg,jpg','max:5000'],
            "gts_registration"=>['required'],
            "gts_registration_number"=>['required_if:gts_registration,1'],
            "gst_tax_code"=>['required'],
            "payment_term_3days"=>['required'],
            "remarks"=>['sometimes'],
        ];
    }


     /**
     * Get the validated data from the request .
     *
     * @return array
     * @method overriding from core
     */
    public function validated()
    {

        if (true) {
            return array_merge(parent::validated(), [
                'pan_card_attachment' => (new FileHelper())->storeImage(request()->pan_card_attachment,Vendor_Info::PAN_CARD_ATTACHMENT),
                'aadhar_card_copy' => (new FileHelper())->storeImage(request()->aadhar_card_copy,Vendor_Info::AADHAR_CARD_ATTACHMENT),
                'license_copy' => (new FileHelper())->storeImage(request()->license_copy,Vendor_Info::LICENSE_COPY),
                'rc_copy_front' => (new FileHelper())->storeImage(request()->rc_copy_front,Vendor_Info::RC_CPY_FRONT),
                'rc_copy_back' => (new FileHelper())->storeImage(request()->rc_copy_back,Vendor_Info::RC_CPY_BACK),
                'insurance_copy' => (new FileHelper())->storeImage(request()->insurance_copy,Vendor_Info::INSURANCE_CPY),
                'transpoter_shed_sheet' => (new FileHelper())->storeImage(request()->transpoter_shed_sheet,Vendor_Info::TRANS_SHED_SHEET),
                'tds_decelration_form_front' => (new FileHelper())->storeImage(request()->tds_decelration_form_front,Vendor_Info::TDS_DEC_FORM_FRONT),
                'tds_decelration_form_back' => (new FileHelper())->storeImage(request()->tds_decelration_form_back,Vendor_Info::TDS_DEC_FORM_BACK),
            ]);
        }
        return parent::validated();
    }
}
