<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware(['auth:admin-api'])->except(['login','register']);
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

        $token = $admin->createToken('ayatacademy')->accessToken;

        return response()->json(['token' => $token], 200);
    }
    public function login(){
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if(Auth::guard('admin')->attempt(['email' => request('email'), 'password' => request('password')])){
            $admin = auth('admin')->user();
            $success['token'] =  $admin->createToken('ayatacademy')->accessToken;
            return response()->json(['success' => $success],200);
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
}
