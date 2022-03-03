<?php

namespace App\Http\Controllers\DocumentVerification;

use App\Action\DocumentVerification\UpdateDocumentsVerificationAction;
use App\Helper\File\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\DocumentVerification\DocumentVerificationResource;
use App\Http\Resources\ParkingYardGate\ParkingYardGateResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ParkingYardGate\Parking_Yard_Gate;
use App\Http\Resources\VehicleInspection\VehicleInspectionResource;
use App\Models\Driver\Driver_Info;
use App\Models\Vehicles\Vehicle_Document;
use App\Models\Vehicles\Vehicle_Inspection;
use App\Models\Vehicles\Vehicle_Type;
use App\Models\Vendors\Vendor_Info;
use App\Service\ParkingYardGate\ParkingYardGateService;
use Illuminate\Support\Facades\Storage;


class DocumentVerificationMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $parking_yard_gate = Parking_Yard_Gate::with('Vehicle_Info')
            ->with('Vehicle_Type')
            ->with('Vehicle_Inspection')
            ->InspectionStatus()
            ->get();

        return ParkingYardGateResource::collection($parking_yard_gate);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, FileHelper $helper)
    {

        if ($request->document_status == Vehicle_Document::VEHICLE_DOCUMENTATION_PASSED) {
            $vendor_status = 1;
        } else {
            $vendor_status = 0;
            (new ParkingYardGateService())->gateOutVehicle($request->vehicle_id);
        }

        $vendor_info = Vendor_Info::create([
            "vehicle_id" => $request->vehicle_id,
            "shed_id" => $request->shed_id,
            "vendor_code" => $request->vendor_code,
            "owner_name" => $request->owner_name,
            "owner_number" => $request->owner_number,
            "pan_card_number" => $request->pan_number,
            "aadhar_card_number" => $request->aadhar_number,
            "bank_acc_number" => $request->bank_acc_number,
            "vendor_status" => $vendor_status,
        ]);

        $vendor_id = Vendor_Info::select('id')->latest('id')->first();

        $vehicle_document = Vehicle_Document::create([
            "vehicle_id" => $request->vehicle_id,
            "vehicle_inspection_id" => $request->vehicle_inspection_id,
            "vendor_id" => $vendor_id->id,
            "license_copy" => $helper->storeImage($request->license_copy, Vehicle_Document::LICENSE_COPY_PATH),
            "aadhar_copy" => $helper->storeImage($request->license_copy, Vehicle_Document::AADHAR_COPY_PATH),
            "pan_copy" => $helper->storeImage($request->license_copy, Vehicle_Document::PAN_COPY_PATH),
            "bank_pass_copy" => $helper->storeImage($request->license_copy, Vehicle_Document::BANK_PASS_COPY_PATH),
            "rc_copy_front" => $helper->storeImage($request->rc_copy_front, Vehicle_Document::RC_COPY_FRONT_PATH),
            "rc_copy_back" => $helper->storeImage($request->rc_copy_back, Vehicle_Document::RC_COPY_BACK_PATH),
            "insurance_copy_front" => $helper->storeImage($request->insurance_copy_front, Vehicle_Document::INSURANCE_COPY_FRONT_PATH),
            "insurance_copy_back" => $helper->storeImage($request->insurance_copy_front, Vehicle_Document::INSURANCE_COPY_BACK_PATH),
            "transport_shed_sheet" => $helper->storeImage($request->transport_shed_sheet, Vehicle_Document::TRANSPORT_SHED_SHEET_COPY_PATH),
            "tds_dec_form_front" => $helper->storeImage($request->tds_dec_form_front, Vehicle_Document::TDS_DEC_FORM_COPY_FRONT_PATH),
            "tds_dec_form_back" => $helper->storeImage($request->tds_dec_form_back, Vehicle_Document::TDS_DEC_FORM_COPY_BACK_PATH),
            "shed_id" => $request->shed_id,
            "insurance_validity" => $request->insurance_validity,
            "ownership_transfer_form" => $helper->storeImage($request->ownership_transfer_form, Vehicle_Document::OWNERSHIP_TRANSFER_FORM_PATH),
            "freight_rate_per_ton" => $request->freight_rate,
            "vendor_flag" => ($request->vendor_code != 0 ? 1 : 0),
            "document_status" => $request->document_status,
            "remarks" => $request->remarks,
        ]);

        Parking_Yard_Gate::where('vehicle_id', $request->vehicle_id)->update(['document_verification_status' => $request->document_status]);

        return response()->json(['message' => 'Updated'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicle_document_info = Vehicle_Document::where('vehicle_id', '=', $id)->with('Vendor_Info')
            ->get();
        return DocumentVerificationResource::collection($vehicle_document_info);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id, UpdateDocumentsVerificationAction $action)
    {
        $document = Vehicle_Document::where('document_status', 1)
            ->where('vehicle_id', $id)
            ->first();


        if ($document) {
            $document = $action->handleUpdateImages($request, $document);

            $is_updated = $document->update();

            if ($is_updated) {
                return response()->json(['message' => 'Update Success'], 200);
            } else {
                return response()->json(['message' => 'Something went wrong'], 500);
            }
        } else {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
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
