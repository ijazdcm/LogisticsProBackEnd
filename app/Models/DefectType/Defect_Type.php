<?php

namespace App\Models\DefectType;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Defect_Type extends Model
{
    use HasFactory;

    protected $table="defect__types";

    protected $fillable=[
        "defect_type",
        "defect_type_status",
        "created_by",
    ];

    public function scopeActive($query)
    {
        $query->where('defect_type_status', 1);
    }
}
