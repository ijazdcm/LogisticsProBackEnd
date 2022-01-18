<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Department\DepartmentResource;
use App\Http\Resources\Designation\DesignationResource;
use App\Http\Resources\Division\DivisionResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [

            "user_id"=>$this->id,
            "username"=>$this->username,
            "email"=>$this->email,
            "mobile_no"=>$this->mobile_no,
            "user_image"=>$this->photo,
            "serial_no"=>$this->serial_no,
            "user_auto_id"=>$this->user_auto_id,
            "division_info"=>DivisionResource::make($this->whenLoaded('Division')),
            "department_info"=>DepartmentResource::make($this->whenLoaded('Department')),
            "designation_info"=>DesignationResource::make($this->whenLoaded('Designation')),

        ];
    }
}
