<?php

namespace App\Http\Resources\Designation;

use Illuminate\Http\Resources\Json\JsonResource;

class DesignationResource extends JsonResource
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
            'designation' => $this->designation_name,
            'designation_status' => $this->designation_status,
            'created_at' => $this->created_at->format('d-m-y'),
        ];
    }
}
