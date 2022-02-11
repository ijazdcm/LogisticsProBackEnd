<?php

namespace App\Http\Controllers\DocumentVerification;

use App\Helper\File\FileHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ParkingYardGate\Parking_Yard_Gate;
use App\Http\Resources\VehicleInspection\VehicleInspectionResource;
use App\Models\Vehicles\Vehicle_Document;
use App\Models\Vehicles\Vehicle_Inspection;
use App\Models\Vehicles\Vehicle_Type;
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
        $vehicleInspectionDetails = Vehicle_Inspection::with('Vehicle_Info')->with('ParkingYard_Info')->get();

        return VehicleInspectionResource::collection($vehicleInspectionDetails);
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

            // "vehicle_inspection_id",
            // "vendor_id",
            // "license_copy",
            // "rc_copy_front",
            // "rc_copy_back",
            // "insurance_copy_front",
            // "insurance_copy_back",
            // "transport_shed_sheet",
            // "tds_dec_form_front",
            // "tds_dec_form_back",
            // "shed_id",
            // "insurance_validity",
            // "ownership_transfer_form",
            // "freight_rate_per_ton",
            // "remarks",
            // "document_status",


            //adding the new Driver
            // $new_driver = Vehicle_Document::create([
            //     "vehicle_inspection_id" => $request->driver_type_id,
            //     "vendor_id" => $request->driver_name,
            //     "license_copy" => $request->driver_code,
            //     "rc_copy_front" => $request->driver_phone_1,
            //     "rc_copy_back" => $request->driver_phone_2,
            //     "insurance_copy_front" => $request->license_no,
            //     "insurance_copy_back" => $request->license_validity_to,
            //     "transport_shed_sheet" => $request->license_validity_status,
            //     "tds_dec_form_front" => $helper->storeImage($request->license_copy_front, Driver_Info::LICENSE_COPY_FRONT_PATH),
            //     "tds_dec_form_back" => $helper->storeImage($request->license_copy_back, Driver_Info::LICENSE_COPY_BACK_PATH),
            //     "shed_id" => $request->driver_address,
            //     "insurance_validity" => $helper->storeImage($request->driver_photo, Driver_Info::DRIVER_PHOTO_PATH),
            //     "ownership_transfer_form" => $helper->storeImage($request->aadhar_card, Driver_Info::AADHAR_PATH),
            //     "pan_card" => $helper->storeImage($request->pan_card, Driver_Info::PAN_CARD_PATH),
            // ]);


            // if ($request->driver_id && $request->old_driver_id) {
            /*
                     this block only executed when above params passed on request
                     */

            //un-assign the locked driver
            // (new DriverService())->unAssignDriver($request->old_driver_id);

            //assign the new driver
            // (new DriverService())->assignDriver($request->driver_id);

            //assign the new driver to vehicle
            // (new ParkingYardGateService())->assignNewDriverToVehicle($request->vehicle_id, $request->driver_id);
            // }

            Vehicle_Document::create($request->validated());
        } else {

            Vehicle_Document::create($request->validated());

            //this service make vehicle on parking Yard table to gateOut status

            (new ParkingYardGateService())->gateOutVehicle($request->vehicle_id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicleInspectionDetails = Vehicle_Inspection::where('id', '=', $id)->with('Vehicle_Info')->with('ParkingYard_Info')->get();

        return VehicleInspectionResource::collection($vehicleInspectionDetails);
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
