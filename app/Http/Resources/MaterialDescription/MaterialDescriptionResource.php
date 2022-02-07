<?php

namespace App\Http\Resources\MaterialDescription;

use Illuminate\Http\Resources\Json\JsonResource;

class MaterialDescriptionResource extends JsonResource
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
            'creation_date' => $this->created_at->format('d-m-y'),
            'material_description' => $this->material_description,
            'status' => $this->material_description_status
        ];
    }
}
