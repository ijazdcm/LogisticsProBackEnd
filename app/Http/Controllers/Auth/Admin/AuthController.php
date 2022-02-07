<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Admin\AdminLoginRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(AdminLoginRequest $request)
    {

        if(Auth::attempt(['username' => $request->username, 'password' => $request->password]))
        {

            $ability= (Auth::user()->is_admin) ? ['is_admin']:['is_user'];

            $token=$request->user()->createToken($request->username,$ability)->plainTextToken;

            $user=User::with('Division')
            ->with('Designation')
            ->with('Department')
            ->where('id',Auth::user()->id)
            ->first();

            return  UserResource::make($user)->additional(['token' => $token]);
        }
        else
        {
            $response=["message"=>"Invalid Username & Password"];
            return response(json_encode($response),401)->header('Content-Type', 'application/json');
        }
    }


    public function logout(Request $request)
    {

        $request->user()->tokens()->delete();
        return response('',204)->header('Content-Type', 'application/json');
    }

}
