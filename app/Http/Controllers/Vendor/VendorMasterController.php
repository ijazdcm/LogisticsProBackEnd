<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vendors\VendorInfoStoreRequest;
use App\Http\Resources\ParkingYardGate\ParkingYardGateResource;
use App\Http\Resources\Vendor\VendorInfoResource;
use App\Models\ParkingYardGate\Parking_Yard_Gate;
use App\Models\Vehicles\Vehicle_Document;
use App\Models\Vendors\Vendor_Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

class VendorMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    public function vendor_request_index()
    {

        $parking_yard_gate = Parking_Yard_Gate::with('Vehicle_Info')
            ->with('Vehicle_Type')
            ->with('Vendor_Info')
            ->with('Vehicle_Document')
            ->whereHas('Vehicle_Document')
            ->get();

        return ParkingYardGateResource::collection($parking_yard_gate);
    }

    public function vendor_approval_index()
    {

        $parking_yard_gate = Parking_Yard_Gate::with('Vehicle_Info')
            ->with('Vehicle_Type')
            ->with('Vehicle_Document')
            ->whereHas('Vehicle_Document')
            ->with('Vendor_Info')
            ->get();

        return ParkingYardGateResource::collection($parking_yard_gate);
    }

    public function vendor_confirmation_index()
    {

        $parking_yard_gate = Parking_Yard_Gate::with('Vehicle_Info')
            ->with('Vehicle_Type')
            ->with('Vehicle_Document')
            ->whereHas('Vehicle_Document')
            ->with('Vendor_Info')
            ->get();

        return ParkingYardGateResource::collection($parking_yard_gate);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendorInfoStoreRequest $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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

        switch ($request) {
            case ($request->vendor_status == 2):
                $vendor_status = 1;
                break;
            case ($request->vendor_status == 3):
                $vendor_status = 2;
                break;
            case ($request->vendor_status == 4):
                $vendor_status = 3;
                break;
            default:
                $vendor_status = 0;
                break;
        }

        $vendor_info = Vendor_Info::where('id', $request->vendor_id)->first();


        if ($vendor_info) {
            if ($vendor_status == 1) {
                $vendor_info->update([
                    'vendor_code' => $request->vendor_code,
                    'owner_name' => $request->owner_name,
                    'owner_number' => $request->owner_number,
                    'pan_card_number' => $request->pan_card_number,
                    'aadhar_card_number' => $request->aadhar_card_number,
                    'bank_name' => $request->bank_name,
                    'bank_acc_number' => $request->bank_acc_number,
                    'bank_acc_holder_name' => $request->bank_acc_holder_name,
                    'bank_branch' => $request->bank_branch,
                    'bank_ifsc' => $request->bank_ifsc_code,
                    'street' => $request->street,
                    'area' => $request->area,
                    'city' => $request->city,
                    'district' => $request->district,
                    'state' => $request->state,
                    'postal_code' => $request->postal_code,
                    'region' => $request->region,
                    'gst_registration' => $request->gst_registration,
                    'gst_registration_number' => $request->gst_registration_number,
                    'gst_tax_code' => $request->gst_tax_code,
                    'payment_term_3days' => $request->payment_term_3days,
                    'vendor_status' => $request->vendor_status,
                    'remarks' => $request->remarks,
                ]);
            } else {
                $vendor_info->update([
                    'vendor_status' => $request->vendor_status,
                    'remarks' => $request->remarks,
                ]);
            }
        } else {
            return response()->json(['message' => 'Update Denied'], 500);
        }

        return response()->json(['message' => 'Updated'], 200);
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
