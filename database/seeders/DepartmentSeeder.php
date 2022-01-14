<?php

namespace Database\Seeders;

use App\Models\Department\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public $departments_list = ["Admin", "Accounts", "Maintenance", "Sourcing", "Billing"];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0, $length = count($this->departments_list); $i < $length; $i++) {

            $departments = new Department();
            $departments->department_name = $this->departments_list[$i];
            $departments->save();
        }
    }
}
