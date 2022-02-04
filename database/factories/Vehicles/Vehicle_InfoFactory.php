<?php

namespace Database\Factories\Vehicles;

use App\Models\Vehicles\Vehicle_Info;
use Illuminate\Database\Eloquent\Factories\Factory;

class Vehicle_InfoFactory extends Factory
{

    protected $model = Vehicle_Info::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            "vehicle_type_id"=>rand(1,2),
            "vehicle_number"=>'TN'.rand(1,80).'NA'.$this->faker->numberBetween($min = 1000, $max = 9999),
            "vehicle_capacity_id"=>rand(1,5),
            "vehicle_body_type_id"=>rand(1,2),
            "rc_copy_front"=>"dummyrcFront".rand(1,20).".jpeg",
            "rc_copy_back"=>"dummyrcBack".rand(1,20).".jpeg",
            "insurance_copy_front"=>"dummyinsuranceFront".rand(1,20).".jpeg",
            "insurance_copy_back"=>"dumminsurancecBack".rand(1,20).".jpeg",
            "insurance_validity"=>now(),
            "fc_validity"=>now(),
            "created_by"=>1

        ];
    }
}
