<?php

namespace App\Models\Vehicles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle_Info extends Model
{
    use HasFactory;

    //FILE PATH CONSTANTS FOR FILE HANDLE FOR THIS MODEL
    public const RC_FRONT_PATH="Vehicle/Rc_copy_front";
    public const RC_BACK_PATH="Vehicle/Rc_copy_back";
    public const INSURANCE_FRONT_PATH="Vehicle/Insurance_copy_front";
    public const INSURANCE_BACK_PATH="Vehicle/Insurance_copy_back";

    protected $table="vehicle__infos";

    protected $fillable=[
        "vehicle_type_id",
        "vehicle_number",
        "vehicle_capacity_id",
        "vehicle_body_type_id",
        "rc_copy_front",
        "rc_copy_back",
        "insurance_copy_front",
        "insurance_copy_back",
        "insurance_validity",
        "fc_validity",
        "vehicle_status",
        "created_by",
    ];


    protected $dates = ['created_at'];

    public function Vehicle_Type()
    {
        return $this->hasOne(Vehicle_Type::class,'id','vehicle_type_id');
    }

    public function Vehicle_Capacity()
    {
        return $this->hasOne(Vehicle_Capacity::class,'id','vehicle_capacity_id');
    }

    public function Vehicle_Body_Type()
    {
        return $this->hasOne(Vehicle_Body_Type::class,'id','vehicle_body_type_id');
    }

}
