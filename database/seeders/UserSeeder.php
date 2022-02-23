<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin login credentials
        User::create([
            "username"=>"naga",
            "email"=>"admin@nagamills.com",
            "password"=>Hash::make('naga'),
            "mobile_no"=>"1231231231",
            "photo"=>"adminImage.jpeg",
            "is_admin"=>1
        ]);
         //user login credentials
        User::create([
            "username"=>"user",
            "email"=>"user@nagamills.com",
            "password"=>Hash::make('naga'),
            "mobile_no"=>"7708454539",
            "photo"=>"userImage.jpeg",
            "division_id"=>1,
            "department_id"=>1,
            "designation_id"=>1,
            "location_id"=>2,

        ]);

        User::factory()->count(20)->create();
    }
}
