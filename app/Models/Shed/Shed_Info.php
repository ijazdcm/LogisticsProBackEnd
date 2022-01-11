<?php

namespace App\Models\Shed;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shed_Info extends Model
{
    use HasFactory;

    protected $table="shed__infos";

    protected $fillable=[
        "shed_type_id",
        "shed_name",
        "shed_owner_name",
        "shed_owner_phone_1",
        "shed_owner_phone_2",
        "shed_owner_address",
        "shed_owner_photo",
        "pan_number",
        "gst_no",
        "created_by",
    ];
}
