<?php

namespace Database\Factories\Divison;

use App\Models\Divison\Division;
use Illuminate\Database\Eloquent\Factories\Factory;

class DivisionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Division::class;
    public function definition()
    {
        return [
            "division_name" => $this->faker->name,
            "division_status" => 1,
            "created_by" => 1
        ];
    }
}
