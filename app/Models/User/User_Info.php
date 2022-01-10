<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Info extends Model
{
    use HasFactory;

    protected $table="user__infos";

    protected $fillable=[
        "user_name",
        "division_id",
        "department_id",
        "designation_id",
        "serial_no",
        "user_auto_id",
        "mobile_no",
        "email_id",
        "photo",
        "created_by",
    ];
}
