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
            'id' => (string)$this->id,
            'creation_date' => (string)$this->created_at,
            'uom' => $this->uom,
            'status' => (string)$this->uom_status
        ];
    }
}
