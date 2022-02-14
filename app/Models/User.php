<?php

namespace App\Models;

use App\Models\Department\Department;
use App\Models\Designation\Designation;
use App\Models\Divison\Division;
use App\Models\Location\Location;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const USER_PHOTO_PATH="User/UsersPhoto/";


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
        'location_id',
        'page_permissions',
        'user_status',
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
        'page_permissions' => 'array',
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

    public function Location()
    {
        return $this->hasOne(Location::class,'id','location_id');
    }

    public function scopeOnlyAdmin($query)
    {
        return $query->where('id','>','2');
    }


}
