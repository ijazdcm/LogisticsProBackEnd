<?php

namespace Database\Seeders;

use App\Models\Vehicles\Vehicle_Info;
use Illuminate\Database\Seeder;

class VendorInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         Vehicle_Info::factory(50)->create();
    }
}
