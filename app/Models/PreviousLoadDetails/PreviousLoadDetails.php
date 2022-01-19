<?php

namespace App\Models\PreviousLoadDetails;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreviousLoadDetails extends Model
{
    use HasFactory;

    protected $table = "previous_load_details";

    protected $fillable = [
        "previous_load_details",
        "previous_load_status",
        "created_by",
    ];
}
