<?php

namespace App\Models\RejectionReason;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RejectionReason extends Model
{
    use HasFactory;

    protected $table = "rejection_reasons";

    protected $fillable = [
        "rejection_reason",
        "rejection_reason_status",
        "created_by",
    ];
}
