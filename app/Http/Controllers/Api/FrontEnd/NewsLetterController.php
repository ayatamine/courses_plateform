<?php

namespace App\Http\Controllers\Api\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\NewsLetterList;
use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $this->validate($request,[
            'email'=>'string|required|email|unique:users'
        ]);
        NewsLetterList::create([
           'email'=>$request->email
        ]);
        return response([
            'messae'=>'Thanks for subscribing to our NewsLetter'
        ],201);
    }
}
