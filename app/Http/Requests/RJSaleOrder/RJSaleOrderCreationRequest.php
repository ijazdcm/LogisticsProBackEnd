<?php

namespace App\Http\Requests\RJSaleOrder;

use Illuminate\Foundation\Http\FormRequest;

class RJSaleOrderCreationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "vehicle_id" => ['required'],
            "tripsheet_id" => ['required'],
            "payment_terms" => ['required'],
            "pay_customer_name" => [''],
            "customer_mobile_no" => [''],
            "customer_PAN_number" => [''],
            "shed_id" => ['required'],
            "material_description_id" => ['required'],
            "material_descriptions" => ['required'],
            "uom_id" => ['required'],
            "order_qty" => ['required'],
            // "customer_code" => "required|regex:/^[\d]{5}$/u|unique:rj_so_creation,customer_code",
            "customer_code" => ['required'],
            "freight_income" => ['required'],
            "advance_amount" => ['required'],
            "last_Delivery_point" => ['required'],
            "empty_load_km" => ['required'],
            "loading_point" => ['required'],
            "unloading_point" => ['required'],
            "empty_km_after_unloaded" => ['required'],
            "expected_delivery_date_time" => ['sometimes', 'required'],
            "expected_return_date_time" => ['sometimes', 'required'],
            "remarks" => ['sometimes', 'required'],
            "rj_so_no" => "required|regex:/^[\d]{6}$/u|unique:rj_so_creation,rj_so_no",
            "created_by" => ['sometimes', 'required'],
        ];
    }
}
