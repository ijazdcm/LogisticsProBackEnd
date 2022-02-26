<?php

namespace Database\Factories\TripSheet;

use App\Models\TripSheet\TripSheet;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

class TripSheetFactory extends Factory
{

    protected $model=TripSheet::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        "trip_sheet_no"=>$this->faker->randomElement($array=['O','H','C']).$this->faker->randomElement($array=['S','T','C']).(new DateTime())->format('dmy').rand(99,999),
        "vehicle_id"=>rand(1,10),
        "driver_id"=>rand(1,10),
        "division_id"=>rand(1,3),
        "trip_advance_eligiblity"=>$this->faker->randomElement($array=['0','1']),
        "advance_amount"=>$this->faker->randomElement($array=['1500','1450','2000']),
        "purpose"=>$this->faker->randomElement($array=['Others','FG sales','STO']),
        "vehicle_sourced_by"=>$this->faker->randomElement($array=['WH-TEAM','LOGISTICS','INVENTERY TEAM']),
        "expected_date_time"=>$this->faker->dateTimeThisYear(),
        "expected_return_date_time"=>$this->faker->dateTimeThisYear(),
        "freight_rate_per_tone"=>$this->faker->randomElement($array=['1500','4000','6000']),
        "advance_payment_bank"=>$this->faker->randomElement($array=['1500','4000','6000']),
        "advance_payment_diesel"=>$this->faker->randomElement($array=['1500','4000','6000']),
        "vehicle_source_by "=>$this->faker->randomElement($array=['a','b','c']),
        "status"=>$this->faker->randomElement($array=['1','0']),
        ];
    }
}
