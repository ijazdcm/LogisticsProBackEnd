<?php

namespace Database\Seeders;

use App\Models\Driver\Driver_Info;
use Illuminate\Database\Seeder;

class DriverInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Driver_Info::factory()->count(50)->create();
    }
}
