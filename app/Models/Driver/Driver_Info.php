<?php

namespace App\Models\Driver;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver_Info extends Model
{
    use HasFactory;


    public const LICENSE_COPY_FRONT_PATH="Driver/LicenseFront";
    public const LICENSE_COPY_BACK_PATH="Driver/LicenseBack";
    public const AADHAR_PATH="Driver/Aadhar";
    public const DRIVER_PHOTO_PATH="Driver/DriverPhoto";
    public const PAN_CARD_PATH="Driver/PanCard";


    protected $table="driver__infos";

    protected $fillable=[
        "driver_type_id",
        "driver_name",
        "driver_code",
        "driver_phone_1",
        "driver_phone_2",
        "license_no",
        "license_validity_to",
        "license_copy_front",
        "license_copy_back",
        "license_validity_status",
        "driver_address",
        "driver_photo",
        "aadhar_card",
        "pan_card",
        "driver_status",
        "driver_is_assigned",
        "created_by",
    ];


     public function driver__types()
     {
          return $this->hasOne(Driver_Type::class,'id','driver_type_id');
     }


     public function scopeAvaiable($query)
     {
         return $query->where('driver_is_assigned',0)->where('driver_status',1);
     }
}
