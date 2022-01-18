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
            'material_description' => $this->material_description
        ];
    }
}
