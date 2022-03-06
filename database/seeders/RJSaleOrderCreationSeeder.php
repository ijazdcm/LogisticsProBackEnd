<?php

namespace Database\Seeders;

// use App\Models\RJSaleOrder\RJSaleOrderCreation;

use App\Models\RJSaleOrder\RJSaleOrderCreation;
use Illuminate\Database\Seeder;

class RJSaleOrderCreationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //RJ Sale Order Details
        // RJSaleOrderCreation
        RJSaleOrderCreation::create([
            "vehicle_id" => "2",
            "tripsheet_id" => "OT190222002",
            "payment_terms" => "2",
            "pay_customer_name" => "James",
            "customer_mobile_no" => "9877765423",
            "customer_PAN_number" => "SEDRD3234R",
            "shed_id" => "3",
            "material_description_id" => "4",
            "material_descriptions" => "VEGITABLES-BRINJALS",
            "uom_id" => "1",
            "order_qty" => "200",
            "customer_code" =>  "34562",
            "hsn_code" =>  "12332112",
            "freight_income" => "3450.00",
            "advance_amount" => "1450.00",
            "last_Delivery_point" => "Chennai",
            "empty_load_km" => "100",
            "loading_point" => "Vizhupuram",
            "unloading_point" => "Theni",
            "empty_km_after_unloaded" => "70",
            "expected_delivery_date_time" => "2022-02-27 10:59:11",
            "expected_return_date_time" => "2022-02-28 10:59:11",
            "remarks" => "Nill",
            "rj_so_no" => "678965",

        ]);
        RJSaleOrderCreation::factory()->count(5)->create();
    }
}
