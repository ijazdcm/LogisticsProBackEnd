<?php

namespace App\Http\Resources\Uom;

use Illuminate\Http\Resources\Json\JsonResource;

class UomResource extends JsonResource
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
            'id' =>$this->id,
            'creation_date' =>$this->created_at->format('d-m-y'),
            'uom' => $this->uom,
            'status' =>$this->uom_status
        ];
    }
}
