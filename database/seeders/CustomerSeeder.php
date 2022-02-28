<?php

namespace Database\Seeders;
// use App\Models\Customer\Customer_info;

use App\Models\Customer\Customer_info;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer_info::factory()->count(2)->create();
        // Customer_info::factory()->count(5)->create();
    }
}
