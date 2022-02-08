<?php

namespace App\Models;

use App\Models\Department\Department;
use App\Models\Designation\Designation;
use App\Models\Divison\Division;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const USER_PHOTO_PATH="User/UsersPhoto";

    public const DIVISION_CODES=["1"=>"FD","2"=>"CD","3"=>"LD","4"=>"MD","5"=>"FA"];

    public const DEPARTMENT_CODES=["1"=>"AD","2"=>"AC","3"=>"MT","4"=>"SO","5"=>"BI"];

    public const DESIGNATION_CODES=["1"=>"AD","2"=>"MA","3"=>"DE","4"=>"SE","5"=>"AS"];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'otp',
        'password',
        'mobile_no',
        'photo',
        'serial_no',
        'user_auto_id',
        'is_admin',
        'division_id',
        'department_id',
        'designation_id',
        'created_by',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function Division()
    {
        return $this->hasOne(Division::class,'id','division_id');
    }

    public function Designation()
    {
        return $this->hasOne(Designation::class,'id','designation_id');
    }

    public function Department()
    {
        return $this->hasOne(Department::class,'id','department_id');
    }



}
