<?php

namespace Database\Seeders;

use App\Models\Designation\Designation;
use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    public $designation_list = ["Admin", "Manager", "Data Entry", "Security", "Assisitant"];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0, $length = count($this->designation_list); $i < $length; $i++) {

            $designations = new Designation();
            $designations->designation_name = $this->designation_list[$i];
            $designations->save();
        }
    }
}
