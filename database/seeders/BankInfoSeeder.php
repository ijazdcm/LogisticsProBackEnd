<?php

namespace Database\Seeders;

use App\Models\Bank\Bank_info;
use Illuminate\Database\Seeder;

class BankInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $bank_list = ["KVB", "AXIS", "SBI", "IOB", "IB","CUB"];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0, $length = count($this->bank_list); $i < $length; $i++) {

            $bank = new Bank_info();
            $bank->bank_name= $this->bank_list[$i];
            $bank->save();

        }
    }
}
