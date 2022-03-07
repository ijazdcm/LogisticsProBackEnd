<?php

namespace Database\Seeders;

use App\Models\Divison\Division;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{


    public $division_list = [
        ["division_name"=>"Foods Dindigul","divison_code"=>"10001010"],
        ["division_name"=>"Foods Aruppukotai","divison_code"=>"10001020"],
        ["division_name"=>"Detergents Dindigul","divison_code"=>"10001070"],
        ["division_name"=>"Minerals Dindigul","divison_code"=>"10001080"],
        ["division_name"=>"Logistics Dindigul","divison_code"=>"91009100"],
        ["division_name"=>"Consumer Dindigul","divison_code"=>"92009290"],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 0, $length = count($this->division_list); $i < $length; $i++) {
            $division = new Division();
            $division->division_name = $this->division_list[$i]['division_name'];
            $division->division_code = $this->division_list[$i]['divison_code'];
            $division->save();
        }
    }
}
