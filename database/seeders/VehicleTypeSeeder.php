<?php

namespace Database\Seeders;

use App\Models\Vehicles\Vehicle_Type;
use Illuminate\Database\Seeder;

class VehicleTypeSeeder extends Seeder
{


    public $vehicle_types_list=["Own","Contract","Hire"];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <count($this->vehicle_types_list) ; $i++) {

            $vehicles_type=new Vehicle_Type();
            $vehicles_type->vehicle_type=$this->vehicle_types_list[$i];
            $vehicles_type->save();
        }
    }
}
