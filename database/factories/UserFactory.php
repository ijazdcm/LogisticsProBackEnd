<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username'=>$this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password'=>Hash::make('test'),
            'mobile_no'=>$this->faker->unique()->numberBetween($min = 1000000000, $max = 10000000000),
            'photo'=>"userIamge".rand(999,9999).".jpeg",
            'serial_no'=>$this->faker->unique()->numberBetween($min = 99999, $max = 999999),
            'user_auto_id'=>$this->faker->unique()->numberBetween($min = 99999, $max = 999999),
            'is_admin'=>rand(0,1),
            'division_id'=>rand(1,5),
            'department_id'=>rand(1,5),
            'designation_id'=>rand(1,5),
            'remember_token' => Str::random(10),

        ];
    }

}
