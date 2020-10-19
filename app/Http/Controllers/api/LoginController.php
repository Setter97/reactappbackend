<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        $login = $request->validate(['email' => 'required|email',
        'password' => 'required|string']);
        

        if (!Auth::attempt($login))
            return response()->json(['Error' => 'Invalid login']);

        $accessToken = Auth::user()->createToken('authToken')->accessToken;

        return response()->json(['Message' => Auth::user(), 'access_token' => $accessToken]);

    
    }

    public function all(Request $reuest)
    {
        $users = User::all();
        return response()->json($users);
    }
}
