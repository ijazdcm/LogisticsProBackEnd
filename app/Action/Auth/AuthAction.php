<?php

namespace App\Action\Auth;

use App\Mail\Auth\ForgetPasswordMail;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use phpDocumentor\Reflection\Types\Boolean;

class AuthAction
{

    public function sendOtp(User $user,int $otp):bool
    {

        sleep(3); //remove this line on production

        Log::channel('otp')->info("Reset Mail For : \t{$user->email} -and Otp is {$otp}" );
        /*
        | in this method mail to a request user need to
        | me implemented after connected to live server un comment the below code
        | View for mail is created but not implemented for use but user info and opt have been passed
        */

        // Mail::to($user->email)->send(new ForgetPasswordMail($user,$otp));

        $user->otp=$otp;
        return ($user->save())?true:false;
    }


}
