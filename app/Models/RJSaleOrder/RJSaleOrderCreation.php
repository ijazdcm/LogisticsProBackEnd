<?php

namespace App\Models\RJSaleOrder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RJSaleOrderCreation extends Model
{
    use HasFactory;

    protected $table = "rj_so_creation";

    protected $fillable = [
        "vehicle_id",
        "tripsheet_id",
        "payment_terms",
        "pay_customer_name",
        "customer_mobile_no",
        "customer_PAN_number",
        "shed_id",
        "material_description_id",
        "material_descriptions",
        "uom_id",
        "order_qty",
        "freight_income",
        "advance_amount",
        "last_Delivery_point",
        "empty_load_km",
        "loading_point",
        "unloading_point",
        "empty_km_after_unloaded",
        "expected_delivery_date_time",
        "expected_return_date_time",
        "remarks",
        "customer_code",
        "rj_so_no",
        "created_by",
    ];
}
