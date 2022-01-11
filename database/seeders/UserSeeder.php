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
        User::create([
            "username"=>"naga",
            "email"=>"admin@nagamills.com",
            "password"=>Hash::make('naga'),
        ]);
    }
}
