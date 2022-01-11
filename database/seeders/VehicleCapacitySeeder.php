<?php

namespace Database\Seeders;

use App\Models\Vehicles\Vehicle_Capacity;
use Illuminate\Database\Seeder;

class VehicleCapacitySeeder extends Seeder
{

    public $vehicle_capacity_types_list=["10","12","15","25","30"];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0,$length=count($this->vehicle_capacity_types_list); $i <$length ; $i++) {

            $vehicles_capacity=new Vehicle_Capacity();
            $vehicles_capacity->vehicle_capacity=$this->vehicle_capacity_types_list[$i];
            $vehicles_capacity->save();
        }
    }
}
