<?php

namespace Database\Seeders;

use App\Models\Vehicles\Vehicle_Body_Type;
use Illuminate\Database\Seeder;

class VehicleBodyTypeSeeder extends Seeder
{

    public $vehicle_body_types_list=["Open","Closed"];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <count($this->vehicle_body_types_list) ; $i++) {

            $vehicles_body_type=new Vehicle_Body_Type();
            $vehicles_body_type->vehicle_type=$this->vehicle_body_types_list[$i];
            $vehicles_body_type->save();
        }
    }
}
