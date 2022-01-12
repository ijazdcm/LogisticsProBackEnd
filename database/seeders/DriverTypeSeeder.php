<?php

namespace Database\Seeders;

use App\Models\Driver\Driver_Type;
use Illuminate\Database\Seeder;

class DriverTypeSeeder extends Seeder
{

    public $driver_types_list=["Own","Contact"];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0,$length=count($this->driver_types_list); $i <$length ; $i++) {

            $driver_type=new Driver_Type();
            $driver_type->driver_type=$this->driver_types_list[$i];
            $driver_type->save();
        }
    }
}
