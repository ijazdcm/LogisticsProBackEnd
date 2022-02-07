<?php

namespace App\Http\Resources\RejectionReason;

use Illuminate\Http\Resources\Json\JsonResource;

class RejectionReasonResource extends JsonResource
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
            'rejection_reason' => $this->rejection_reason,
            'rejection_reason_status' => $this->rejection_reason_status,
            'created_at' => $this->created_at->format('d-m-y'),
        ];
    }
}
