<?php

namespace Database\Factories\RJSaleOrder;

use App\Models\RJSaleOrder\RJSaleOrderCreation;
use Illuminate\Database\Eloquent\Factories\Factory;

class RJSaleOrderCreationFactory extends Factory
{
    protected $model = RJSaleOrderCreation::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "vehicle_id" => rand(1, 10),
            "tripsheet_id" => "HC" . rand(10, 30) . "0" . rand(1, 9) . "22" . "00" . rand(1, 9),
            "payment_terms" =>  rand(1, 2),
            "pay_customer_name" => $this->faker->firstName($gender = 'male'),
            "customer_mobile_no" => $this->faker->unique()->numberBetween($min = 1000000000, $max = 10000000000),
            "customer_PAN_number" => "ABCTY" . rand(1000, 9999) . "D",
            "shed_id" => rand(1, 5),
            "material_description_id" => rand(1, 5),
            "material_descriptions" => $this->faker->paragraph,
            "uom_id" => rand(1, 5),
            "order_qty" => rand(101, 999),
            "customer_code" =>  $this->faker->unique()->numberBetween($min = 10001, $max = 99999),
            "freight_income" => rand(1001, 9999) . "00",
            "advance_amount" => rand(1001, 9999) . "00",
            "last_Delivery_point" => $this->faker->word,
            "empty_load_km" => rand(101, 999),
            "loading_point" => $this->faker->word,
            "unloading_point" => $this->faker->word,
            "empty_km_after_unloaded" => rand(101, 999),
            "expected_delivery_date_time" => $this->faker->dateTimeThisMonth(),
            "expected_return_date_time" => $this->faker->dateTimeThisMonth(),
            "remarks" => $this->faker->sentence(1),
            "rj_so_no" => $this->faker->unique()->numberBetween($min = 100001, $max = 999999),
        ];
    }
}
