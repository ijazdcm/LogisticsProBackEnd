<?php

namespace Database\Seeders;

use App\Models\DefectType\Defect_Type;
use Illuminate\Database\Seeder;

class DefectTypeSeeder extends Seeder
{

    public $defect_list = ["Rain Damage", "Opened Package", "Weight Loss", "Damaged on Shipment", "Late Delivery"];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0, $length = count($this->defect_list); $i < $length; $i++) {

            $defect = new Defect_Type();
            $defect->defect_type = $this->defect_list[$i];
            $defect->save();
        }
    }
}
