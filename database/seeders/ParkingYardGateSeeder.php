<?php

namespace Database\Seeders;

use App\Models\ParkingYardGate\Parking_Yard_Gate;
use Illuminate\Database\Seeder;

class ParkingYardGateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          Parking_Yard_Gate::factory()->count(70)->create();
    }
}
