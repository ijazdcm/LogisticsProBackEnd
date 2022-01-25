<?php

namespace App\Http\Resources\DefectType;

use Illuminate\Http\Resources\Json\JsonResource;

class DefectTypeResource extends JsonResource
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
            "defect_type_id"=>$this->id,
            "defect_type"=>$this->defect_type
        ];
    }
}
