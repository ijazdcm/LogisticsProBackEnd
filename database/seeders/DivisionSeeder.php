<?php

namespace Database\Seeders;

use App\Models\Divison\Division;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{


    public $division_list = ["NLFD", "NLCD", "NLLD", "NLMD", "NLFA"];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 0, $length = count($this->division_list); $i < $length; $i++) {

            $division = new Division();
            $division->division_name = $this->division_list[$i];
            $division->save();
        }
    }
}
