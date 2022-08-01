<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt($request->only('email','password'))){
            $user = User::find(auth()->user()->id);
            $token = $user->createToken('Authentication Token')->accessToken;
            return response()->json([
                "data" => [
                    "message" => "Authenticated Successfully",
                    "email" =>auth()->user()->email,
                    "name" =>auth()->user()->name,
                    "bearer_token" => $token,
                ]
                ]);
        }

        return response()->json([
            "data" => [
                "message" => "Email or Password incorrect"
            ]
            ]);
    }
}
