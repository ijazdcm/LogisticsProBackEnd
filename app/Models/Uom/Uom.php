<?php

namespace App\Models\Uom;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uom extends Model
{
    use HasFactory;

    protected $table = "uoms";

    protected $fillable = [
        "uom",
        "uom_status",
        "created_by",
    ];
}
