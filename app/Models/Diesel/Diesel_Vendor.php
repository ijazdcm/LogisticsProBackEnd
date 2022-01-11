<?php

namespace App\Models\Diesel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diesel_Vendor extends Model
{
    use HasFactory;

    protected $table="diesel__vendors";

    protected $fillable=[
        "diesel_vendor_name",
        "vendor_code",
        "vendor_phone_1",
        "vendor_phone_2",
        "vendor_email_id",
        "created_by",
    ];
}
