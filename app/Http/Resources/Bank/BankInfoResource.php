<?php

namespace App\Http\Resources\Bank;

use Illuminate\Http\Resources\Json\JsonResource;

class BankInfoResource extends JsonResource
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
            "bank_id"=>$this->id,
            "bank_name"=>$this->bank_name,
            "bank_status"=>$this->bank_status,
            "created_at"=>$this->created_at->format('d-m-y')
        ];
    }
}
