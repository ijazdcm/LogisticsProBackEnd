<?php

namespace Database\Seeders;

use App\Models\PreviousLoadDetails\PreviousLoadDetails;
use Illuminate\Database\Seeder;

class PreviousLoadDetailsSeeder extends Seeder
{
    public $previous_load_details_list = ["Atta", "Maida", "Bran", "Rosted Sooji", "Vegetables"];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 0, $length = count($this->previous_load_details_list); $i < $length; $i++) {

            $previous_load_details = new PreviousLoadDetails();
            $previous_load_details->previous_load_details = $this->previous_load_details_list[$i];
            $previous_load_details->save();
        }
    }
}
