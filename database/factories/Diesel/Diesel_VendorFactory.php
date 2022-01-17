<?php

namespace Database\Factories\Diesel;

use App\Models\Diesel\Diesel_Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

class Diesel_VendorFactory extends Factory
{
    protected $model = Diesel_Vendor::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "diesel_vendor_name"=>$this->faker->firstName($gender = 'male'),
            "vendor_code"=>"DIVENDOR".rand(1000,9999),
            "vendor_phone_1"=>$this->faker->unique()->numberBetween($min = 1000000000, $max = 10000000000),
            "vendor_phone_2"=>$this->faker->unique()->numberBetween($min = 1000000000, $max = 10000000000),
            "vendor_email_id"=>$this->faker->email,
        ];
    }
}
