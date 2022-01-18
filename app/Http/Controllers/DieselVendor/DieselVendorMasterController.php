<?php

namespace App\Http\Controllers\DieselVendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\DieselVendor\DieselVendorRequest;
use App\Http\Resources\DieselVendor\DieselVendorInfoResource;
use App\Models\Diesel\Diesel_Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DieselVendorMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DieselVendorInfoResource::collection(Cache::remember('diesel_vendor',now()->addDecade(),function()
        {
                return Diesel_Vendor::active()->get();
        }));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DieselVendorRequest $request)
    {
        //vendor code auto generated handled on DieselVendorInfoObserver
         return DieselVendorInfoResource::make( Diesel_Vendor::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diesel_vendor=Diesel_Vendor::active()->where('id',$id)->first();

        if($diesel_vendor)
        {
        return new DieselVendorInfoResource($diesel_vendor);
        }
        return response()->json(['message' => 'Vendor Not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DieselVendorRequest $request, $id)
    {
        $diesel_vendor=Diesel_Vendor::active()
        ->where('id',$id)
        ->first();
        if($diesel_vendor)
        {

           $is_updated=$diesel_vendor->update($request->validated());

           if($is_updated)
           {
              $updated_diesel_vendor=Diesel_Vendor::active()->where('id',$id)->first();
               return  DieselVendorInfoResource::make($updated_diesel_vendor);
           }



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
        $diesel_vendor=Diesel_Vendor::active()->where('id',$id)->first();
        if($diesel_vendor)
        {
            $diesel_vendor->update([$diesel_vendor->diesel_vendors_status=0]);
            return response('',204)->header('Content-Type', 'application/json');
        }

        return response()->json(['message' => 'Diesel Vendor Not found'], 404);
    }
}
