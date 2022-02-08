<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Action\Auth\AuthAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Admin\AdminLoginRequest;
use App\Http\Requests\Auth\ForgetPassword\ForgetPassWordRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helper\Otp\OtpHelper;
use App\Http\Requests\Auth\ForgetPassword\VerifyOtpRequest;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    public function login(AdminLoginRequest $request)
    {

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {

            $ability = (Auth::user()->is_admin) ? ['is_admin'] : ['is_user'];

            $token = $request->user()->createToken($request->username, $ability)->plainTextToken;

            $user = User::with('Division')
                ->with('Designation')
                ->with('Department')
                ->where('id', Auth::user()->id)
                ->first();

            return UserResource::make($user)->additional(['token' => $token]);
        }
        else {
            $response = ["message" => "Invalid Username & Password"];
            return response(json_encode($response), 401)->header('Content-Type', 'application/json');
        }
    }


    public function forgetPassword(ForgetPassWordRequest $request, AuthAction $authAction)
    {

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $otp = (new OtpHelper())->generateOtp();

            if ($authAction->sendOtp($user, $otp)) {
                $response = ["message" => "Check Your Mail For Otp"];
                return response()->json($response, 200);
            }
        }
        else {
            $response = ["message" => "Check Your Email Address"];
            return response()->json($response, 404);
        }
    }

    public function verifyOtp(VerifyOtpRequest $request)
    {

        $user = User::where('email', $request->email)->first();

        if ($user) {


            if ($user->otp == $request->otp) {

                $user->otp = 0;
                if ($user->save()) {
                    $response = ["message" => "Otp Matched & Verified"];
                    return response()->json($response, 200);
                }

            }
            else {
                $response = ["message" => "Enter a valid OTP"];
                return response()->json($response, 403);
            }
        }


    }

    public function logout(Request $request)
    {

        $request->user()->tokens()->delete();
        return response('', 204)->header('Content-Type', 'application/json');
    }

}
