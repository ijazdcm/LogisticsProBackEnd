<?php

namespace Database\Factories\Shed;

use App\Models\Shed\Shed_Info;
use Illuminate\Database\Eloquent\Factories\Factory;

class Shed_InfoFactory extends Factory
{
    protected $model = Shed_Info::class;
    public $state_code;
    public $ze_code;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->state_code=rand(1,33);
        $this->ze_code=rand(1,9);

        return [
        "shed_type_id"=>rand(1,2),
        "shed_name"=>"Shed".rand(50,1000)."Test",
        "shed_owner_name"=>$this->faker->firstName($gender = 'male'),
        "shed_owner_phone_1"=>$this->faker->unique()->numberBetween($min = 1000000000, $max = 10000000000),
        "shed_owner_phone_2"=>$this->faker->unique()->numberBetween($min = 1000000000, $max = 10000000000),
        "shed_owner_address"=>$this->faker->address,
        "shed_owner_photo"=>"ShedOwner".rand(1,20).".jpeg",
        "pan_number"=>"ABCTY".rand(1000,9999)."D",
        "gst_no"=>$this->state_code."ABCTY".rand(1000,9999)."D".$this->ze_code."Z".($this->state_code+$this->ze_code),
        ];
    }
}
