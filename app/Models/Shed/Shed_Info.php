<?php

namespace App\Models\Shed;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shed_Info extends Model
{
    use HasFactory;

    public const SHED_OWNER_PHOTO_PATH = "Shed/ShedOwner/";

    protected $table = "shed__infos";

    protected $fillable = [
        "shed_type_id",
        "shed_name",
        "shed_owner_name",
        "shed_owner_phone_1",
        "shed_owner_phone_2",
        "shed_owner_address",
        "shed_owner_photo",
        "shed_adhar_number",
        "pan_number",
        "gst_no",
        "shed_status",
        "created_by",
    ];


    public function Shed_Type()
    {
        return $this->hasOne(Shed_Type::class, 'id', 'shed_type_id');
    }

    public function scopeActive($query)
    {
        return $query->where('shed_status', 1);
    }
}
