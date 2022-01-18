<?php

namespace Database\Seeders;

use App\Models\MaterialDescription\MaterialDescription;
use Illuminate\Database\Seeder;

class MaterialDescriptionSeeder extends Seeder
{
    public $material_description_list = ["Vegetables", "Fruits", "Buckets", "Accessories", "Wheat"];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0, $length = count($this->material_description_list); $i < $length; $i++) {

            $material_descriptions = new MaterialDescription();
            $material_descriptions->material_description = $this->material_description_list[$i];
            $material_descriptions->save();
        }
    }
}
