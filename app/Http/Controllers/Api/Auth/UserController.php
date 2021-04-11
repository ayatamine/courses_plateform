<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'sex' => 'required|in:male,female',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'sex' => $request->sex,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $token = $user->createToken('ayatacademy')->accessToken;

        return response()->json(['token' => $token], 200);
    }
    public function login(){
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('ayatacademy')->accessToken;
            return response()->json(['success' => $success], 200);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
    public function details()
    {
        return response()->json(['user' => auth('api')->user()], 200);
    }
    public function logout () {
      if(auth('api')->user()){
        $token = auth('api')->user()->token();
        $token->revoke();

        $response = 'You have been succesfully logged out!';
        return response($response, 200);
      }
      return response()->json(['error'=>'Unauthorised'], 401);

    }
}
