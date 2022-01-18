<?php

namespace App\Models\MaterialDescription;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialDescription extends Model
{
    use HasFactory;

    protected $table = "material_description";

    protected $fillable = [
        "material_description",
        "material_description_status",
        "created_by",
    ];
}
