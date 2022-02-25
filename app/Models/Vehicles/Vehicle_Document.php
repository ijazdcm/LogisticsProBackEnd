<?php

namespace App\Models\Vehicles;

use App\Models\ParkingYardGate\Parking_Yard_Gate;
use App\Models\Vendors\Vendor_Info;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle_Document extends Model
{
    use HasFactory;

    public const VEHICLE_DOCUMENTATION_PASSED = '1';
    public const LICENSE_COPY_PATH = "VehicleDocument/License/";
    public const AADHAR_COPY_PATH = "VehicleDocument/aadhar/";
    public const PAN_COPY_PATH = "VehicleDocument/pan/";
    public const BANK_PASS_COPY_PATH = "VehicleDocument/bankPass/";
    public const RC_COPY_FRONT_PATH = "VehicleDocument/rcCopyFront/";
    public const RC_COPY_BACK_PATH = "VehicleDocument/rcCopyBack/";
    public const INSURANCE_COPY_FRONT_PATH = "VehicleDocument/insuranceCopyFront/";
    public const INSURANCE_COPY_BACK_PATH = "VehicleDocument/insuranceCopyBack/";
    public const TRANSPORT_SHED_SHEET_COPY_PATH = "VehicleDocument/transportShedSheet/";
    public const TDS_DEC_FORM_COPY_FRONT_PATH = "VehicleDocument/tdsDecFormFront/";
    public const TDS_DEC_FORM_COPY_BACK_PATH = "VehicleDocument/tdsDecFormBack/";
    public const OWNERSHIP_TRANSFER_FORM_PATH = "VehicleDocument/ownershipTransferForm/";

    protected $table = "vehicle__documents";

    protected $fillable = [
        "vehicle_id",
        "vehicle_inspection_id",
        "vendor_id",
        "license_copy",
        "aadhar_copy",
        "pan_copy",
        "bank_pass_copy",
        "rc_copy_front",
        "rc_copy_back",
        "insurance_copy_front",
        "insurance_copy_back",
        "transport_shed_sheet",
        "tds_dec_form_front",
        "tds_dec_form_back",
        "shed_id",
        "insurance_validity",
        "ownership_transfer_form",
        "freight_rate_per_ton",
        "vendor_flag",
        "document_status",
        "remarks",
        "created_by",
    ];


    public function Vendor_Info()
    {
        return $this->hasOne(Vendor_Info::class, 'id', 'vendor_id');
    }
}
