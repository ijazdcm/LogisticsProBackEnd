<?php

namespace App\Http\Controllers\DocumentVerification;

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


class DocumentVerificationMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $vehicleInspectionDetails = Vehicle_Inspection::with('Vehicle_Info')->with('ParkingYard_Info')->get();

        // return VehicleInspectionResource::collection($vehicleInspectionDetails);


        $parking_yard_gate = Parking_Yard_Gate::with('Vehicle_Info')->with('Vehicle_Type')
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

            // return $request;

            $vendor_info = Vendor_Info::create([
                "vehicle_id" => $request->vehicle_id,
                "shed_id" => $request->shed_id,
                "vendor_code" => $request->vendor_code,
                "owner_name" => $request->owner_name,
                "owner_number" => $request->owner_number,
                "pan_card_number" => $request->pan_number,
                "aadhar_card_number" => $request->aadhar_number,
                "bank_acc_number" => $request->bank_acc_number,
                "vendor_status" => 2,
            ]);

            $vehicle_document = Vehicle_Document::create([
                "vehicle_inspection_id" => $request->vehicle_inspection_id,
                "vendor_id" => Vendor_Info::select('id')->latest('id')->first(),
                "license_copy" => $helper->storeImage($request->license_copy, Vehicle_Document::LICENSE_COPY_PATH),
                "rc_copy_front" => $helper->storeImage($request->rc_copy_front, Vehicle_Document::RC_COPY_FRONT_PATH),
                "rc_copy_back" => $helper->storeImage($request->rc_copy_back, Vehicle_Document::RC_COPY_BACK_PATH),
                "insurance_copy_front" => $helper->storeImage($request->insurance_copy_front, Vehicle_Document::INSURANCE_COPY_FRONT_PATH),
                "insurance_copy_back" => $helper->storeImage($request->insurance_copy_front, Vehicle_Document::INSURANCE_COPY_BACK_PATH),
                "transport_shed_sheet" => $helper->storeImage($request->transport_shed_sheet, Vehicle_Document::TRANSPORT_SHED_SHEET_COPY_BACK_PATH),
                "tds_dec_form_front" => $helper->storeImage($request->tds_dec_form_front, Vehicle_Document::TDS_DEC_FORM_COPY_FRONT_PATH),
                "tds_dec_form_back" => $helper->storeImage($request->tds_dec_form_back, Vehicle_Document::TDS_DEC_FORM_COPY_BACK_PATH),
                "shed_id" => $request->shed_id,
                "insurance_validity" => $request->insurance_validity,
                "ownership_transfer_form" => $helper->storeImage($request->ownership_transfer_form, Vehicle_Document::OWNERSHIP_TRANSFER_FORM_PATH),
                "freight_rate_per_ton" => $request->freight_rate,
                "remarks" => $request->remarks,
                "document_status" => $request->document_status,
            ]);

            // return Vendor_Info::select('id')->latest('id')->first();
            // Vehicle_Document::create($request->validated());
        } else {

            $vehicle_document = Vehicle_Document::create([
                "vehicle_inspection_id" => $request->vehicle_inspection_id,
                "vendor_id" => $request->vendor_code,
                "license_copy" => $helper->storeImage($request->license_copy, Vehicle_Document::LICENSE_COPY_PATH),
                "rc_copy_front" => $helper->storeImage($request->rc_copy_front, Vehicle_Document::RC_COPY_FRONT_PATH),
                "rc_copy_back" => $helper->storeImage($request->rc_copy_back, Vehicle_Document::RC_COPY_BACK_PATH),
                "insurance_copy_front" => $helper->storeImage($request->insurance_copy_front, Vehicle_Document::INSURANCE_COPY_FRONT_PATH),
                "insurance_copy_back" => $helper->storeImage($request->insurance_copy_front, Vehicle_Document::INSURANCE_COPY_BACK_PATH),
                "transport_shed_sheet" => $helper->storeImage($request->transport_shed_sheet, Vehicle_Document::TRANSPORT_SHED_SHEET_COPY_BACK_PATH),
                "tds_dec_form_front" => $helper->storeImage($request->tds_dec_form_front, Vehicle_Document::TDS_DEC_FORM_COPY_FRONT_PATH),
                "tds_dec_form_back" => $helper->storeImage($request->tds_dec_form_back, Vehicle_Document::TDS_DEC_FORM_COPY_BACK_PATH),
                "shed_id" => $request->shed_id,
                "insurance_validity" => $request->insurance_validity,
                "ownership_transfer_form" => $helper->storeImage($request->ownership_transfer_form, Vehicle_Document::OWNERSHIP_TRANSFER_FORM_PATH),
                "freight_rate_per_ton" => $request->freight_rate,
                "remarks" => $request->remarks,
                "document_status" => $request->document_status,
            ]);

            $vendor_info = Vendor_Info::create([
                "vehicle_id" => $request->vehicle_id,
                "shed_id " => $request->shed_id,
                "owner_name" => $request->owner_name,
                "owner_number" => $request->owner_number,
                "pan_card_number" => $request->pan_number,
                "aadhar_card_number" => $request->aadhar_number,
                "bank_acc_number" => $request->bank_acc_number,
                "vendor_status" => 0,

            ]);
            //this service make vehicle on parking Yard table to gateOut status

            (new ParkingYardGateService())->gateOutVehicle($request->vehicle_id);
        }
        return DocumentVerificationResource::make($request);
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
