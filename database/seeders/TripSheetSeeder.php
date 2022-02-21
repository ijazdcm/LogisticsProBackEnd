<?php

namespace Database\Seeders;

use App\Models\TripSheet\TripSheet;
use Illuminate\Database\Seeder;

class TripSheetSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TripSheet::factory()->count(10)->create();
    }
}
