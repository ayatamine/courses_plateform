<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterUsersController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'country' => $data['country'],
            'email_verification_code' => '1f5dffds',
            'password' => Hash::make($data['password']),
        ]);
        if($user){
            return response()->json([
                'data'=>['success'=>true]
            ]);
        }else{
            return response()->json([
                'errors'=>['root'=>'cannot create user']
            ]);
        }
    }
}
