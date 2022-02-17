<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\CustomerRequest;
use App\Http\Resources\Customer\CustomerResource;
use App\Models\Customer\Customer_info;
use Customer;
use Illuminate\Http\Request;
use App\Helper\File\FileHelper;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\ParkingYardGate\ParkingYardGateResource;
use App\Models\ParkingYardGate\Parking_Yard_Gate;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // return CustomerResource::collection(Cache::remember('customer', now()->addDay(), function () {

      //   return Customer_info::with('customer_id')->get();
      // }));
      $parking_yard_gate = Parking_Yard_Gate::with('Vehicle_Type')
      ->gate_in_status()
      ->get();

  return ParkingYardGateResource::collection($parking_yard_gate);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request, FileHelper $helper)
    {
        //vendor code auto generated handled on DieselVendorInfoObserver
        // return CustomerResource::make(Customer_info::create($request->validated()));
        return $request;


        //adding the new Driver
        $new_customer = Customer_info::create([
            "customer_name" => $request->customer_name,
            "customer_PAN_card_number" => $request->customer_PAN_card_number,
            "customer_Aadhar_card_number" => $request->customer_Aadhar_card_number,
            "customer_bank_id" => $request->customer_bank_id,
            "customer_bank_branch" => $request->customer_bank_branch,
            "customer_bank_ifsc_code" => $request->customer_bank_ifsc_code,
            "customer_bank_account_number" => $request->customer_bank_account_number,
            "customer_street_name" => $request->customer_street_name,
             "customer_area" => $request->customer_area,
             "customer_city" => $request->customer_city,
            "customer_district" => $request->customer_district,
            "customer_postal_code" => $request->customer_postal_code,
            "customer_region" => $request->customer_region,
            "customer_gst_number" => $request->customer_gst_number,
            "customer_payment_terms" => $request->customer_payment_terms,
             "customer_remarks" => $request->customer_remarks,
            "customer_PAN_card" => $helper->storeImage($request->customer_PAN_card, Customer_info::CUSTOMER_PAN_CARD_PATH),
            "customer_Aadhar_card" => $helper->storeImage($request->customer_Aadhar_card, Customer_info::CUSTOMER_AADHAR_CARD_PATH),
            "customer_bank_passbook" => $helper->storeImage($request->customer_bank_passbook, Customer_info::CUSTOMER_BANK_PASSBOOK_PATH),
          ]);

        return  new CustomerResource($new_customer->load('customer_id'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
