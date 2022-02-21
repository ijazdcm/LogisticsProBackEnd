<?php

namespace Database\Factories\Vehicles;

use App\Models\Vehicles\Vehicle_Inspection;
use Illuminate\Database\Eloquent\Factories\Factory;

class Vehicle_InspectionFactory extends Factory
{

    protected $model=Vehicle_Inspection::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "vehicle_id"=>rand(1,50),
            "truck_clean"=>$this->faker->randomElement($array = array ('1','0')),
            "bad_smell"=>$this->faker->randomElement($array = array ('1','0')),
            "insect_vevils_presence"=>$this->faker->randomElement($array = array ('1','0')),
            "tarpaulin_srf"=>$this->faker->randomElement($array = array ('1','0')),
            "tarpaulin_non_srf"=>$this->faker->randomElement($array = array ('1','0')),
            "insect_vevils_presence_in_tar"=>$this->faker->randomElement($array = array ('1','0')),
            "truck_platform"=>$this->faker->randomElement($array = array ('1','0')),
            "previous_load_details"=>$this->faker->randomElement($array = array ('1','0')),
            "vehicle_fit_for_loading"=>$this->faker->randomElement($array = array ('1','0')),
            "remarks"=>$this->faker->text($maxNbChars = 20),
            "vehicle_inspection_status"=>$this->faker->randomElement($array = array ('1','0'))
        ];
    }
}
