<?php

namespace App\Action\Driver;

use App\Helper\File\FileHelper;
use App\Models\Driver\Driver_Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateDriverImageAction
{

    protected $helper;


    public function __construct()
    {
      $this->helper=new FileHelper();
    }

    public function handleUpdateImages(Request $request,Driver_Info $driver):Driver_Info
    {


     if($request->hasFile('license_copy_front'))
     {
         Storage::delete(Driver_Info::LICENSE_COPY_FRONT_PATH."/".$driver->license_copy_front);
         $license_copy_front=$request->file('license_copy_front');
         $new_file_name=$this->helper->storeImage($license_copy_front,Driver_Info::LICENSE_COPY_FRONT_PATH);
         $driver->license_copy_front=$new_file_name;

     }

     if($request->hasFile('license_copy_back'))
     {

         Storage::delete(Driver_Info::LICENSE_COPY_BACK_PATH."/".$driver->license_copy_back);
         $license_copy_back=$request->license_copy_back;
         $new_file_name=$this->helper->storeImage($license_copy_back,Driver_Info::LICENSE_COPY_BACK_PATH);
         $driver->license_copy_back=$new_file_name;
     }

     if($request->hasFile('driver_photo'))
     {
         Storage::delete(Driver_Info::DRIVER_PHOTO_PATH."/".$driver->driver_photo);
         $driver_photo=$request->driver_photo;
         $new_file_name=$this->helper->storeImage($driver_photo,Driver_Info::DRIVER_PHOTO_PATH);
         $driver->driver_photo=$new_file_name;
     }
     if($request->hasFile('aadhar_card'))
     {
         $aadhar_card=$request->aadhar_card;
         Storage::delete(Driver_Info::AADHAR_PATH."/".$driver->aadhar_card);
         $new_file_name=$this->helper->storeImage($request->aadhar_card,Driver_Info::AADHAR_PATH);
         $driver->aadhar_card=$new_file_name;
     }
     if($request->hasFile('pan_card'))
     {
         $pan_card=$request->pan_card;
         Storage::delete(Driver_Info::PAN_CARD_PATH."/".$driver->pan_card);
         $new_file_name=$this->helper->storeImage($request->pan_card,Driver_Info::PAN_CARD_PATH);
         $driver->pan_card=$new_file_name;
     }

     return $driver;
    }



}
