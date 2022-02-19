<?php

namespace Database\Seeders;

use App\Models\Vehicles\Vehicle_Inspection;
use Illuminate\Database\Seeder;

class VehicleInspectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehicle_Inspection::factory()->count(5)->create();
    }
}
