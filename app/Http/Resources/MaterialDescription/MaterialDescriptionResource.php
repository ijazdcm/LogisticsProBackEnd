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
            'id' => (string)$this->id,
            'creation_date' => (string)$this->created_at,
            'material_description' => $this->material_description,
            'status' => (string)$this->material_description_status
        ];
    }
}
