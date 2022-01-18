<?php

namespace Database\Seeders;

use App\Models\Uom\Uom;
use Illuminate\Database\Seeder;

class UomSeeder extends Seeder
{
    public $uoms_list = ["TON", "KG", "L", "G", "NO"];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0, $length = count($this->uoms_list); $i < $length; $i++) {

            $uoms = new Uom();
            $uoms->uom = $this->uoms_list[$i];
            $uoms->save();
        }
    }
}
