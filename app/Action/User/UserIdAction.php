<?php
namespace App\Action\User;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class UserIdAction{


    public function getUserId( $divison,$department,$designation):string
    {

         return "".User::DIVISION_CODES[$divison]."".User::DEPARTMENT_CODES[$department]."".User::DESIGNATION_CODES[$designation];

    }

}
