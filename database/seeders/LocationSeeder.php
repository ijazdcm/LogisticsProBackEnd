<?php

namespace Database\Seeders;

use App\Models\Location\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    public $location_list = [
        ["plant_code"=>"1003","location_name"=>"FD-Kanyakumari","alpha_code"=>"K"],
        ["plant_code"=>"1004","location_name"=>"FD-Trichy","alpha_code"=>"T"],
        ["plant_code"=>"1007","location_name"=>"FD-Chennai","alpha_code"=>"C"],
        ["plant_code"=>"1009","location_name"=>"FD-Dindigul","alpha_code"=>"D"],
        ["plant_code"=>"1142","location_name"=>"FD-Madurai","alpha_code"=>"M"],
        ["plant_code"=>"1020","location_name"=>"FD-Aruppukotai","alpha_code"=>"A"],
        ["plant_code"=>"9100","location_name"=>"LD-Dindigul","alpha_code"=>"D"],
        ["plant_code"=>"9290","location_name"=>"CD-Dindigul","alpha_code"=>"D"],
        ["plant_code"=>"1080","location_name"=>"MD-Dindigul","alpha_code"=>"D"]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0, $length = count($this->location_list); $i < $length; $i++) {

            $locations = new Location();
            $locations->location_name = $this->location_list[$i]['location_name'];
            $locations->location_code = $this->location_list[$i]['plant_code'];
            $locations->location_alpha_code = $this->location_list[$i]['alpha_code'];
            $locations->save();
        }
    }
}
