<?php

namespace Database\Seeders;

use App\Models\Status\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    public $status_list = ["Parking Yard Gate In", "Vehicle Inspection", "Vehicle Maintenance", "Tripsheet Creation", "Tripsheet Closure"];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 0, $length = count($this->status_list); $i < $length; $i++) {

            $status = new Status();
            $status->status = $this->status_list[$i];
            $status->save();
        }
    }
}
