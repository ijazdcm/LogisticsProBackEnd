<?php

namespace App\Models\Divison;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $table="divisions";

    protected $fillable=[
        "division_name",
        "division_status",
        "created_by",
    ];
}
