<?php

namespace Database\Factories\Customer;

use App\Models\Customer\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model=Customer::class;

    public function definition()
    {
        $Vh_Type=rand(1,4); //to fill the Party name by vehicle Type

        return [
            "id" => $Vh_Type,
            "customer_name" => $this->faker->name,
            "customer_mobile_number" => $this->faker->unique()->numberBetween($min = 1000000000, $max = 10000000000),
            "customer_PAN_card_number" => $Vh_Type,
            "customer_PAN_card" => "dummyOdoPhoto.jpeg",
            "customer_Aadhar_card" => "dummyOdoPhoto.jpeg",
            "customer_Aadhar_card_number"  => $Vh_Type,
            "customer_bank_passbook" => "dummyOdoPhoto.jpeg",
            "customer_bank_id" => rand(1,6),
            "customer_bank_branch"  => $Vh_Type,
            "customer_bank_ifsc_code"  => $Vh_Type,
            "customer_bank_account_number"  => $Vh_Type,
            "customer_street_name"  => $Vh_Type,
            "customer_area"  => $Vh_Type,
            "customer_city"  => $Vh_Type,
            "customer_district"  => $Vh_Type,
            "customer_state"  => $Vh_Type,
            "customer_postal_code"  => $Vh_Type,
            "customer_region"  => $Vh_Type,
            "customer_gst_number"  => $Vh_Type,
            "customer_payment_terms"  => $Vh_Type,
            "customer_remarks" => $this->faker->text,
            "customer_status"  => ($Vh_Type!=1 && $Vh_Type!=2)?rand(1,2):3,
            "created_by"  => 0
        ];
    }
}
