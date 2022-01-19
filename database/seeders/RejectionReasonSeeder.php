<?php

namespace Database\Seeders;

use App\Models\RejectionReason\RejectionReason;
use Illuminate\Database\Seeder;

class RejectionReasonSeeder extends Seeder
{
    public $rejection_reason_list = ["Vendor Information Invalid", "Truck Not Clean", "Vendor Insurance Expired", "Advance Amount Mismatching", "Invalid PAN Number"];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 0, $length = count($this->rejection_reason_list); $i < $length; $i++) {

            $rejection_reason = new RejectionReason();
            $rejection_reason->rejection_reason = $this->rejection_reason_list[$i];
            $rejection_reason->save();
        }
    }
}
