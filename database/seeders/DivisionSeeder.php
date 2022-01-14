<?php

namespace Database\Seeders;

use App\Models\Divison\Division;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Divison\Division::factory(5)->create();
        Division::factory()->count(5)->create();
    }
}
