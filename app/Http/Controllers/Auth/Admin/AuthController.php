<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Admin\AdminLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(AdminLoginRequest $request)
    {

        if(Auth::attempt(['username' => $request->username, 'password' => $request->password]))
        {
            $token=$request->user()->createToken($request->username)->plainTextToken;
            $response=["token"=>$token];
            return response(json_encode($response),200)->header('Content-Type', 'application/json');
        }
        else
        {
            $response=["message"=>"Failed To Authenticate"];
            return response(json_encode($response),401)->header('Content-Type', 'application/json');
        }
    }


    public function logout(Request $request)
    {

        $request->user()->tokens()->delete();
        return response('',204)->header('Content-Type', 'application/json');
    }

}
