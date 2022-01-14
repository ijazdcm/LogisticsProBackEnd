<?php

namespace App\Http\Resources\Shed;

use Illuminate\Http\Resources\Json\JsonResource;

class ShedTypeResource extends JsonResource
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
            "shed_id"=>$this->id,
            "shed_type"=>$this->shed_type
        ];
    }
}
