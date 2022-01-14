<?php

namespace Database\Seeders;

use App\Models\Shed\Shed_Type;
use Illuminate\Database\Seeder;

class ShedTypeSeeder extends Seeder
{
    public $shed_type_list=["RJ Shed","FJ Shed"];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0,$length=count($this->shed_type_list); $i < $length; $i++) {
            $shed_type=new Shed_Type();
            $shed_type->shed_type=$this->shed_type_list[$i];
            $shed_type->save();
        }
    }
}
