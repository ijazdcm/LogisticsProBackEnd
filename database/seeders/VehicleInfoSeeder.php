<?php

namespace Database\Seeders;

use App\Models\Vehicles\Vehicle_Info;
use Illuminate\Database\Seeder;

class VehicleInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehicle_Info::factory()->count(50)->create();
    }
}
