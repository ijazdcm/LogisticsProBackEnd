<?php

namespace App\Action\Customer;

use App\Helper\File\FileHelper;
use App\Models\Customer\Customer_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


class UpdateCustomerImage
{

    protected $helper;


    public function __construct()
    {
      $this->helper=new FileHelper();
    }

    public function handleUpdateImages(Request $request,Customer_info $customer):Customer_info
    {


     if($request->hasFile('customer_PAN_card'))
     {
         Storage::delete(Customer_info::CUSTOMER_PAN_CARD_PATH."/".$customer->customer_PAN_card);
         Log::info("message");
         $customer_PAN_card=$request->customer_Aadhar_card;
         $new_file_name=$this->helper->storeImage($customer_PAN_card,Customer_info::CUSTOMER_PAN_CARD_PATH);
         $customer->customer_PAN_card=$new_file_name;
     }

     if($request->hasFile('customer_Aadhar_card'))
     {

         Storage::delete(Customer_info::CUSTOMER_AADHAR_CARD_PATH."/".$customer->customer_Aadhar_card);
         Log::info("message");
         $customer_Aadhar_card=$request->customer_Aadhar_card;
         $new_file_name=$this->helper->storeImage($customer_Aadhar_card,Customer_info::CUSTOMER_AADHAR_CARD_PATH);
         $customer->customer_Aadhar_card=$new_file_name;
     }

     if($request->hasFile('customer_bank_passbook'))
     {
         Storage::delete(Customer_info::CUSTOMER_BANK_PASSBOOK_PATH."/".$customer->customer_bank_passbook);
         Log::info("message");
         $customer_bank_passbook=$request->customer_bank_passbook;
         $new_file_name=$this->helper->storeImage($customer_bank_passbook,Customer_info::CUSTOMER_BANK_PASSBOOK_PATH);
         $customer->customer_bank_passbook=$new_file_name;
     }


     return $customer;
    }
}
