<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use http\Env\Response;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Utilities\ProxyRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    protected $proxy;
    public function __construct()
    {
        $this->proxy = new ProxyRequest('user');
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
        event(new Registered($user));
        // $resp = $this->proxy->grantPasswordToken(
        //     $user->email,
        //     request('password')
        // );
        // return response([
        //     'token' => $resp->access_token,
        //     'expiresIn' => $resp->expires_in,
        //     'message' => 'Your account has been created',
        // ], 201);
        $token = $user->createToken('student_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ],201);

    }
    public function login(){
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if(!Auth::attempt(request()->only('email', 'password'))){
           
            return response()->json(['message'=>'Invalid login details'], 401);

        }
        $user = User::where('email', request()['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
        ]);
    }
    public function details()
    {
        return response()->json(['user' => auth('sanctum')->user()], 200);
    }
    public function logout () {
      if( auth('sancutm')->user()) {
          $user = auth('sancutm')->user()->tokens()->delete();

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
            'user'=>auth('api')->user(),
            'message' => 'Token has been refreshed.',
        ], 200);
    }
    public function verifyEmail(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'verification_code' => 'required|string|min:4'
        ]);
        $user = User::whereEmail($request->email)->first();
        if($user->email_verified_at !== null){
            return response()->json([
                'message' => 'Your account already verified'
            ],409);
        }
        if($user->email_verification_code === $request->verification_code){
            $user->email_verification_code =  null;
            $user->email_verified_at =  now();
            $user->save();
            return response()->json([
                'message' => 'Your account is active now'
            ],200);
        }
        return response()->json([
            'message' => 'Invalid verification code or account'
        ],403);
        
    }
    public function resendVerification(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
        ]);
         $user = User::whereEmail($request->email)->first();
         $user->sendEmailVerificationNotification();
         return response()->json([
            'message' => 'Email Verification sent!'
        ],200);
    }
}
