<?php

namespace App\Http\Resources\PreviousLoadDetails;

use Illuminate\Http\Resources\Json\JsonResource;

class PreviousLoadDetailsResource extends JsonResource
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
            'previous_load_details' => $this->previous_load_details,
            'previous_load_status' => $this->previous_load_status,
            'created_at' => $this->created_at->format('d-m-y'),
        ];
    }
}
