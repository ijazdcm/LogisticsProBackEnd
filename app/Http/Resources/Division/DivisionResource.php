<?php

namespace App\Http\Resources\Division;

use Illuminate\Http\Resources\Json\JsonResource;

class DivisionResource extends JsonResource
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
            'division' => $this->division_name,
            'division_status' => $this->division_status,
            'created_at' => $this->created_at->format('d-m-y'),
        ];
    }
}
