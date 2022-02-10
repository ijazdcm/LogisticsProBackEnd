<?php

namespace Database\Seeders;

use App\Models\Location\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    public $location_list = ["Salem", "Trichy", "Chennai"];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0, $length = count($this->location_list); $i < $length; $i++) {

            $locations = new Location();
            $locations->location_name = $this->location_list[$i];
            $locations->save();
        }
    }
}
