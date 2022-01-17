<?php

namespace Database\Seeders;

use App\Models\Diesel\Diesel_Vendor;
use Illuminate\Database\Seeder;

class DieselVendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Diesel_Vendor::factory()->count(50)->create();
    }
}
