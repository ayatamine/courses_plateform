<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Utilities\ProxyRequest;

class UserController extends Controller
{
    protected $proxy;
    public function __construct(ProxyRequest $proxy)
    {
        $this->proxy = $proxy;
    }
    public function register(Request $request)
    {

        $this->validate($request, [
            'first_name' => 'string|required|min:3',
            'last_name' => 'string|required|min:3',
            'sex' => 'string|required|in:male,female',
            'email' => 'string|required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'sex' => $request->sex,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $resp = $this->proxy->grantPasswordToken(
            $user->email,
            request('password')
        );
        return response([
            'token' => $resp->access_token,
            'expiresIn' => $resp->expires_in,
            'message' => 'Your account has been created',
        ], 201);
//        $token = $user->createToken('ayatacademy')->accessToken;
//
//        return response()->json(['token' => $token], 200);
    }
    public function login(){
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
//            $user = Auth::user();
//            $success['token'] =  $user->createToken('ayatacademy')->accessToken;
//            return response()->json(['success' => $success], 200);
            $resp = $this->proxy
                ->grantPasswordToken(request('email'), request('password'));

            return response([
                'token' => $resp->access_token,
                'expiresIn' => $resp->expires_in,
                'message' => 'You have been logged in',
            ], 200);
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
      if(auth('api')->user()) {
          $token = auth('api')->user()->token();
          $token->revoke();

          // remove the httponly cookie
          cookie()->queue(cookie()->forget('refresh_token'));

          return response([
              'message' => 'You have been successfully logged out',
          ], 200);
      }
      return response([
          'message'=>'ALready logged out'
      ],200);

    }
    public function refreshTo()
    {
        $resp = $this->proxy->refreshAccessToken();

        return response([
            'token' => $resp->access_token,
            'expiresIn' => $resp->expires_in,
            'message' => 'Token has been refreshed.',
        ], 200);
    }
}
