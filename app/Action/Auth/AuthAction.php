<?php

namespace App\Action\Auth;

use App\Events\Auth\SendOtpEvent;
use App\Models\User;
use Illuminate\Support\Facades\Event;


class AuthAction
{

    public function sendOtp(User $user,int $otp):bool
    {

        sleep(1); //remove this line on production

        Event::dispatch(new SendOtpEvent($user));

        $user->otp=$otp;
        return ($user->save())?true:false;
    }


}
