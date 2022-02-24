<?php

namespace App\Http\Controllers\Customer;

use App\Action\Customer\UpdateCustomerImage as CustomerUpdateCustomerImage;
use App\Action\Driver\UpdateCustomerImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\CustomerRequest;
use App\Http\Resources\Customer\CustomerResource;
use App\Helper\File\FileHelper;
use App\Http\Requests\Customer\CustomerUpdateRequest;
use Illuminate\Support\Facades\Cache;
use App\Models\Customer\Customer_info;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return CustomerResource::collection(Cache::remember('Customer_info', now()->addDay(), function () {

        //     // return Customer_info::with('bank_name')
        //     //   ->customer()
        //     //   ->get();
        //     // return CustomerResource::collection(Customer_info::all());
        // }));

        return CustomerResource::collection(Customer_info::all());

        // return CustomerResource::collection(Cache::remember('customer', now()->addDay(), function () {

        //     return Customer_info::with('bank_infos')->get();
        // }));
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


        // $new_customer=Customer_info::create($request->validated());

        // $customer=Customer_info::active()->with('bank_infos')->find($new_customer->id);

        // return CustomerResource::make($customer);
        // DB::transaction(function () use ($request) {
        //     CustomerRequest::create($request->validated());
        // });

        // return CustomerResource::make($request);

        // adding the new customer
        // return $request;
        $new_customer = Customer_info::create([
            "creation_type" => $request->creation_type,
            "customer_name" => $request->customer_name,
            "customer_mobile_number" => $request->customer_mobile_number,
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
            "customer_state" => $request->customer_state,
            "customer_postal_code" => $request->customer_postal_code,
            "customer_region" => $request->customer_region,
            "customer_gst_number" => $request->customer_gst_number,
            "customer_payment_terms" => $request->customer_payment_terms,
            "customer_remarks" => $request->customer_remarks,
            "customer_PAN_card" => $helper->storeImage($request->customer_PAN_card, Customer_info::CUSTOMER_PAN_CARD_PATH),
            "customer_Aadhar_card" => $helper->storeImage($request->customer_Aadhar_card, Customer_info::CUSTOMER_AADHAR_CARD_PATH),
            "customer_bank_passbook" => $helper->storeImage($request->customer_bank_passbook, Customer_info::CUSTOMER_BANK_PASSBOOK_PATH),

          ]);

        return  new CustomerResource($new_customer->load('bank_infos'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $customer=Customer_info::where('customer_status',1)
                                ->where('id',$id)
                                ->first();

        if($customer)
        {
            // return new CustomerResource($customer->load('customer_id'));
            // return  CustomerResource::make($customer);
            return new CustomerResource($customer->load('bank_infos'));
            // return new DriverInfoResource($driver->load('driver__types'));

        }

        return response()->json(['message' => 'Customer Not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerUpdateRequest $request, $id,CustomerUpdateCustomerImage $action)

    {

        $customer=Customer_info::where('customer_status',1)
        ->where('id',$id)
        ->first();
        if($customer)
        {


          $customer=$action->handleUpdateImages($request,$customer);

           $is_updated=$customer->update([
            "creation_type" => $request->creation_type,
            "customer_name" => $request->customer_name,
            "customer_mobile_number" => $request->customer_mobile_number,
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
            "customer_state" => $request->customer_state,
            "customer_region" => $request->customer_region,
            "customer_gst_number" => $request->customer_gst_number,
            "customer_payment_terms" => $request->customer_payment_terms,
             "customer_remarks" => $request->customer_remarks,

           ]);

           if($is_updated)
           {
              $updated_customer=Customer_info::
              where('id',$id)
              ->first();
               return CustomerResource::make($updated_customer->load('bank_infos'));
           }

        //    if ($is_updated) {
        //     $updated_driver = Driver_Info::where('id', $id)->first();
        //     return  DriverInfoResource::make($updated_driver->load('driver__types'));
        // }

        }
        return response()->json(['message' => 'Something went wrong'],500);
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
