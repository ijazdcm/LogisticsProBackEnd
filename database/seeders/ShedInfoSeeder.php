<?php

namespace Database\Seeders;

use App\Models\Shed\Shed_Info;
use Illuminate\Database\Seeder;

class ShedInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Shed_Info::factory()->count(5)->create();
    }
}
