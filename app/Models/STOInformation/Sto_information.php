<?php

namespace App\Models\STOInformation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sto_information extends Model
{
    use HasFactory;

    protected $table="sto_informations";

    protected $fillable=[
        "tripsheet_id",
        "sto_delivery_number",
        "delivery_date_time",
        "pod_copy",
        "driver_id",
        "expense_to_be_capture",
        "created_by",
    ];
}
