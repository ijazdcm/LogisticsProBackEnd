<?php

namespace App\Http\Resources\RJSaleOrder;

use DateTime;
use Illuminate\Http\Resources\Json\JsonResource;

class RJSaleOrderCreationResource extends JsonResource
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
            "vehicle_id" => $this->vehicle_id,
            "tripsheet_id" => $this->tripsheet_id,
            "payment_terms" => $this->payment_terms,
            "pay_customer_name" => $this->pay_customer_name,
            "customer_mobile_no" => $this->customer_mobile_no,
            "customer_PAN_number" => $this->customer_PAN_number,
            "shed_id" => $this->shed_id,
            "material_description_id" => $this->material_description_id,
            "material_descriptions" => $this->material_descriptions,
            "uom_id" => $this->uom_id,
            "order_qty" => $this->order_qty,
            "customer_code" => $this->customer_code,
            "hsn_code" => $this->hsn_code,
            "freight_income" => $this->freight_income,
            "advance_amount" => $this->advance_amount,
            "last_Delivery_point" => $this->last_Delivery_point,
            "empty_load_km" => $this->empty_load_km,
            "loading_point" => $this->loading_point,
            "unloading_point" => $this->unloading_point,
            "empty_km_after_unloaded" => $this->empty_km_after_unloaded,
            "expected_delivery_date_time" => $this->expected_delivery_date_time,
            "expected_return_date_time" => $this->expected_return_date_time,
            "remarks" => $this->remarks,
            "rj_so_no" => $this->rj_so_no,
            // "created_by" => $this->created_by,
            // "created_at" => $this->timeFormat($this->created_at->format('d.m.Y'))
            // "created_at" => $this->created_at,
        ];
    }

    public function timeFormat($source)
    {
        $date = new DateTime($source);
        return $date->format('d-m-y');
    }
}
