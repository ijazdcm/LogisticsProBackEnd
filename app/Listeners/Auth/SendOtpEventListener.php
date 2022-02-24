<?php

namespace App\Listeners\Auth;

use App\Events\Auth\SendOtpEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendOtpEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(SendOtpEvent $event)
    {


        Log::channel('otp')->info("Reset Mail For : \t{$event->user->email} -and Otp is {$event->user->otp}" );
        /*
        | in this method mail to a request user need to
        | me implemented after connected to live server un comment the below code
        | View for mail is created but not implemented for use but user info and opt have been passed
        */

        // Mail::to($user->email)->send(new ForgetPasswordMail($user,$otp));

    }
}
