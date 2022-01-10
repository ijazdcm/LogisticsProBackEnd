<?php

namespace App\Models\Shed;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shed_Type extends Model
{
    use HasFactory;

    protected $table="shed__types";

    protected $fillable=[
        "shed_type",
        "shed_type_status",
        "created_by",
    ];
}
