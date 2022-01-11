<?php

 namespace App\Action\Vehicles;

use App\Helper\File\FileHelper;
use App\Models\Vehicles\Vehicle_Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UpdateVehicleImageAction
 {

       protected $helper;


       public function __construct()
       {
         $this->helper=new FileHelper();
       }

       public function handleUpdateImages(Request $request,Vehicle_Info $vehicle):Vehicle_Info
       {


        if($request->hasFile('rc_copy_front'))
        {
            Storage::delete(Vehicle_Info::RC_FRONT_PATH."/".$vehicle->rc_copy_front);
            $rc_copy_front=$request->file('rc_copy_front');
            $new_file_name=$this->helper->storeImage($rc_copy_front,Vehicle_Info::RC_FRONT_PATH);
            $vehicle->rc_copy_front=$new_file_name;

        }

        if($request->hasFile('rc_copy_back'))
        {

            Storage::delete(Vehicle_Info::RC_BACK_PATH."/".$vehicle->rc_copy_back);
            $rc_copy_back=$request->rc_copy_back;
            $new_file_name=$this->helper->storeImage($rc_copy_back,Vehicle_Info::RC_BACK_PATH);
            $vehicle->rc_copy_back=$new_file_name;
        }

        if($request->hasFile('insurance_copy_front'))
        {
            Storage::delete(Vehicle_Info::INSURANCE_FRONT_PATH."/".$vehicle->insurance_copy_front);
            $insurance_copy_front=$request->insurance_copy_front;
            $new_file_name=$this->helper->storeImage($insurance_copy_front,Vehicle_Info::INSURANCE_FRONT_PATH);
            $vehicle->insurance_copy_front=$new_file_name;
        }
        if($request->hasFile('insurance_copy_back'))
        {
            $insurance_copy_back=$request->insurance_copy_back;
            Storage::delete(Vehicle_Info::INSURANCE_BACK_PATH."/".$vehicle->insurance_copy_back);
            $new_file_name=$this->helper->storeImage($request->insurance_copy_back,Vehicle_Info::INSURANCE_BACK_PATH);
            $vehicle->insurance_copy_back=$new_file_name;
        }

        return $vehicle;
       }
 }
