<?php

namespace App\Action\DocumentVerification;

use App\Helper\File\FileHelper;
use App\Models\Vehicles\Vehicle_Document;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UpdateDocumentsVerificationAction
{

    protected $helper;


    public function __construct()
    {
        $this->helper = new FileHelper();
    }

    public function handleUpdateImages(Request $request, Vehicle_Document $document): Vehicle_Document
    {

        if ($request->hasFile('pan_copy')) {
            Storage::delete(Vehicle_Document::PAN_COPY_PATH . "/" . $request->pan_copy);
            $pan_copy = $request->pan_copy;
            $new_file_name = $this->helper->storeImage($pan_copy, Vehicle_Document::PAN_COPY_PATH);
            $document->pan_copy = $new_file_name;
        }

        if ($request->hasFile('aadhar_copy')) {
            Storage::delete(Vehicle_Document::AADHAR_COPY_PATH . "/" . $request->aadhar_copy);
            $aadhar_copy = $request->aadhar_copy;
            $new_file_name = $this->helper->storeImage($aadhar_copy, Vehicle_Document::AADHAR_COPY_PATH);
            $document->aadhar_copy = $new_file_name;
        }

        if ($request->hasFile('license_copy')) {
            Storage::delete(Vehicle_Document::LICENSE_COPY_PATH . "/" . $request->license_copy);
            $license_copy = $request->license_copy;
            $new_file_name = $this->helper->storeImage($license_copy, Vehicle_Document::LICENSE_COPY_PATH);
            $document->license_copy = $new_file_name;
        }


        if ($request->hasFile('rc_copy_front')) {
            $rc_copy_front = $request->rc_copy_front;
            Storage::delete(Vehicle_Document::RC_COPY_FRONT_PATH . "/" . $request->rc_copy_front);
            $new_file_name = $this->helper->storeImage($rc_copy_front, Vehicle_Document::RC_COPY_FRONT_PATH);
            $document->rc_copy_front = $new_file_name;
        }

        if ($request->hasFile('rc_copy_back')) {
            $rc_copy_back = $request->rc_copy_back;
            Storage::delete(Vehicle_Document::RC_COPY_BACK_PATH . "/" . $request->rc_copy_back);
            $new_file_name = $this->helper->storeImage($rc_copy_back, Vehicle_Document::RC_COPY_BACK_PATH);
            $document->rc_copy_back = $new_file_name;
        }
        if ($request->hasFile('insurance_copy_front')) {
            $insurance_copy_front = $request->insurance_copy_front;
            Storage::delete(Vehicle_Document::INSURANCE_COPY_FRONT_PATH . "/" . $request->insurance_copy_front);
            $new_file_name = $this->helper->storeImage($insurance_copy_front, Vehicle_Document::INSURANCE_COPY_FRONT_PATH);
            $request->insurance_copy_front = $new_file_name;
        }
        if ($request->hasFile('transport_shed_sheet')) {
            $transport_shed_sheet = $request->transport_shed_sheet;
            Storage::delete(Vehicle_Document::TRANSPORT_SHED_SHEET_COPY_PATH . "/" . $request->transport_shed_sheet);
            $new_file_name = $this->helper->storeImage($transport_shed_sheet, Vehicle_Document::TRANSPORT_SHED_SHEET_COPY_PATH);
            $request->transport_shed_sheet = $new_file_name;
        }
        if ($request->hasFile('bank_pass_copy')) {
            $bank_pass_copy = $request->bank_pass_copy;
            Storage::delete(Vehicle_Document::BANK_PASS_COPY_PATH . "/" . $request->bank_pass_copy);
            $new_file_name = $this->helper->storeImage($bank_pass_copy, Vehicle_Document::BANK_PASS_COPY_PATH);
            $document->bank_pass_copy = $new_file_name;
        }
        if ($request->hasFile('tds_dec_form_front')) {
            $tds_dec_form_front = $request->tds_dec_form_front;
            Storage::delete(Vehicle_Document::TDS_DEC_FORM_COPY_FRONT_PATH . "/" . $request->tds_dec_form_front);
            $new_file_name = $this->helper->storeImage($tds_dec_form_front, Vehicle_Document::TDS_DEC_FORM_COPY_FRONT_PATH);
            $document->tds_dec_form_front = $new_file_name;
        }
        if ($request->hasFile('tds_dec_form_back')) {
            $tds_dec_form_back = $request->tds_dec_form_back;
            Storage::delete(Vehicle_Document::TDS_DEC_FORM_COPY_BACK_PATH . "/" . $request->tds_dec_form_back);
            $new_file_name = $this->helper->storeImage($tds_dec_form_back, Vehicle_Document::TDS_DEC_FORM_COPY_BACK_PATH);
            $document->tds_dec_form_back = $new_file_name;
        }

        return $document;
    }
}
