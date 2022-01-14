<?php

namespace Database\Seeders;

use App\Models\Divison\Division;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    public $Divison_list=["NLFD","NLCD","NLMD","NLLD","NLFA"];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0,$length=count($this->Divison_list); $i < $length; $i++) {

            $divison_type=new Division();
            $divison_type->division_name=$this->Divison_list[$i];
            $divison_type->save();
        }
    }
}
