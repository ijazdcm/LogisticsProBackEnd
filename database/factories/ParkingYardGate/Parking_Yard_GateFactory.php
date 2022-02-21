<?php

namespace Database\Factories\ParkingYardGate;

use App\Models\ParkingYardGate\Parking_Yard_Gate;
use Illuminate\Database\Eloquent\Factories\Factory;

class Parking_Yard_GateFactory extends Factory
{

     protected $model=Parking_Yard_Gate::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $Vh_Type=rand(1,4); //to fill the Party name by vehicle Type

        return [
            "vehicle_type_id"=>$Vh_Type,
            "vehicle_id"=>rand(1,50),
            "driver_id"=>($Vh_Type==1||$Vh_Type==2)?rand(1,50):null,
            "odometer_km"=>($Vh_Type==1||$Vh_Type==2)?rand(9999,99999):null,
            "odometer_photo"=>($Vh_Type==1||$Vh_Type==2)?"dummyOdoPhoto.jpeg":null,
            "vehicle_number"=>'TN'.rand(1,80).'NA'.$this->faker->numberBetween($min = 999, $max = 9999),
            "vehicle_capacity_id"=>rand(1,5),
            "driver_name"=>$this->faker->firstName($gender = 'male'),
            "driver_contact_number"=>$this->faker->unique()->numberBetween($min = 1000000000, $max = 10000000000),
            "vehicle_body_type_id"=>rand(1,2),
            "party_name"=>($Vh_Type==4)?$this->faker->firstName($gender = 'male'):"null",
            "remarks"=>$this->faker->text,
            "parking_status"=>rand(1,3),
        ];
    }
}
