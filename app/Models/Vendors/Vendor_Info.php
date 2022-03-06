<?php

namespace App\Models\Vendors;

use App\Models\ParkingYardGate\Parking_Yard_Gate;
use App\Models\Shed\Shed_Info;
use App\Models\Vehicles\Vehicle_Document;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor_Info extends Model
{
    use HasFactory;

    // public const PAN_CARD_ATTACHMENT="";
    // public const AADHAR_CARD_ATTACHMENT="";
    // public const LICENSE_COPY="";
    // public const RC_CPY_FRONT="";
    // public const RC_CPY_BACK="";
    // public const INSURANCE_CPY="";
    // public const TRANS_SHED_SHEET="";
    // public const TDS_DEC_FORM_FRONT="";
    // public const TDS_DEC_FORM_BACK="";


    protected $table = "vendor__infos";

    protected $fillable = [
        'vehicle_id',
        'shed_id',
        'vendor_code',
        'owner_name',
        'owner_number',
        'pan_card_number',
        'aadhar_card_number',
        'bank_name',
        'bank_acc_number',
        'bank_acc_holder_name',
        'bank_branch',
        'bank_ifsc',
        'street',
        'area',
        'city',
        'district',
        'state',
        'postal_code',
        'region',
        'gst_registration',
        'gst_registration_number',
        'gst_tax_code',
        'payment_term_3days',
        'vendor_status',
        'remarks',
        'created_by',
    ];

    public function Parking_Yard()
    {
        return $this->hasOne(Parking_Yard_Gate::class, 'vehicle_id', 'vehicle_id');
    }
    public function Shed_Info()
    {
        return $this->hasOne(Shed_Info::class, 'id', 'shed_id');
    }

    public function Vehicle_Document()
    {
        return $this->hasOne(Vehicle_Document::class, 'vendor_id', 'id');
    }

    public function Vendor_Info()
    {
        return $this->hasOne(Vendor_Info::class, 'vehicle_id', 'vehicle_id');
    }
}
