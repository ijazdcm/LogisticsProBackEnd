<?php

namespace Database\Factories\Driver;

use App\Models\Driver\Driver_Info;
use Illuminate\Database\Eloquent\Factories\Factory;

class Driver_InfoFactory extends Factory
{

    protected $model = Driver_Info::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        "driver_type_id"=>rand(1,2),
        "driver_name"=>$this->faker->firstName($gender = 'male'),
        "driver_code"=>$this->faker->unique()->numberBetween($min = 100000, $max = 1000000),
        "driver_phone_1"=>$this->faker->unique()->numberBetween($min = 1000000000, $max = 10000000000),
        "driver_phone_2"=>$this->faker->unique()->numberBetween($min = 1000000000, $max = 10000000000),
        "license_no"=>"TN".rand(10,50)."N".$this->faker->unique()->numberBetween($min = 10000000000, $max = 100000000000),
        "license_validity_to"=>now(),
        "license_copy_front"=>"dummyLicenseFront".rand(1,20).".jpeg",
        "license_copy_back"=>"dummyLicenseBack".rand(1,20).".jpeg",
        "driver_address"=>$this->faker->address,
        "driver_photo"=>"dummyDriver".rand(1,20).".jpeg",
        "aadhar_card"=>"dummyDriverAadhar".rand(1,20).".jpeg",
        "pan_card"=>"dummyDriverPan".rand(1,20).".jpeg",
        ];
    }
}
