<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Utilities\ProxyRequest;
class AdminController extends Controller
{
    public $proxy;
    public function __construct(ProxyRequest  $proxy){
        $this->middleware(['auth:admin-api'])->except(['login','register','refreshTo']);
        $this->proxy = $proxy;
    }
    public function register(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'sex' => 'required|in:male,female',
            'email' => 'required|email|unique:Admins',
            'password' => 'required|min:6',
        ]);

        $admin = Admin::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'sex' => $request->sex,
            'email' => $request->email,
            'bio'=>'your bio here',
            'password' => bcrypt($request->password)
        ]);
        $resp = $this->proxy->grantPasswordToken(
            $admin->email,
            request('password')
        );
        return response([
            'token' => $resp->access_token,
            'expiresIn' => $resp->expires_in,
            'message' => 'Your account has been created',
        ], 201);

//        $token = $admin->createToken('ayatacademy')->accessToken;
//
//        return response()->json(['token' => $token], 200);
    }
    public function login(){
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if(Auth::guard('admin')->attempt(['email' => request('email'), 'password' => request('password')])){
            $admin = auth('admin')->user();

           $token =  $admin->createToken('ayatacademy');

            return response([
                'token' => $token->accessToken,
                'expiresIn' => $token->token->expires_at->diffInSeconds(Carbon::now()),
                'message' => 'You have been logged in',
            ], 200);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
    public function details()
    {
        return response()->json(['Admin' => Auth::guard('admin-api')->user()], 200);

    }
    public function logout () {
        if(Auth::guard('admin-api')->user()){
            $token = Auth::guard('admin-api')->user()->token();
            $token->revoke();

            $response = 'You have been succesfully logged out!';
            return response($response, 200);
        }
        return response()->json(['error'=>'Unauthorised'], 401);


    }
    public function refreshTo(Request $request)
    {

        $params =[
            'grant_type' => 'password',
            'client_id' => config('services.passport.password_client_id'),
            'client_secret' => config('services.passport.password_client_secret'),
            'scope' => 'admin',
            'username' => $request->email,
            'password' => $request->password,
        ];
        $proxy = \Request::create('oauth/token', 'post', $params);
        $resp = json_decode(app()->handle($proxy)->getContent());

        $this->setHttpOnlyCookie($resp->refresh_token);

        return $resp;

    }
    protected function setHttpOnlyCookie(string $refreshToken)
    {
        cookie()->queue(
            'refresh_token',
            $refreshToken,
            14400, // 10 days
            null,
            null,
            false,
            true // httponly
        );
    }
}
