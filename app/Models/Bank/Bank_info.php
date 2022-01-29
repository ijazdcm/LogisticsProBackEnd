<?php

namespace App\Models\Bank;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank_info extends Model
{
    use HasFactory;

    protected $table="bank_infos";

    protected $fillable=[
        "bank_name",
        "bank_status",
        "created_by",
    ];
}
