<?php

namespace Database\Seeders;

use App\Models\Vendors\Vendor_Info;
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

         Vendor_Info::factory(50)->create();
    }
}
