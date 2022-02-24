<?php

namespace App\Mail\Auth;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;
    public int $otp;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user,int $otp )
    {
        $this->user=$user;
        $this->otp=$otp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.Auth.ForgetPasswordMailMarkDown',[
            'user' => $this->user,'otp'=>$this->otp
        ]);
    }
}
