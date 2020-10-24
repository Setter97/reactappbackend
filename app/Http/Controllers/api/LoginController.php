<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
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

    public function register(Request $request){

        $validator=Validator::make($request->toArray(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if($validator->fails()){
            return response()->json(['Message' => 'Usuario existente', 'error' => $validator->errors()]);
        }
        
        $user=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => '999999999',
            'password' => Hash::make($request->password),
            
        ]);

        $accessToken =$user->createToken('authToken')->accessToken;

        return response()->json(['Message' => $user, 'access_token' => $accessToken]);
    }
}
