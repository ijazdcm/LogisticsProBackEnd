<?php
namespace App\Helper\Otp;


class OtpHelper
{

      public function generateOtp():int
      {
        return rand(999,9999);
      }

}
