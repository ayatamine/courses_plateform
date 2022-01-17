<?php

namespace App\Http\Controllers\Api\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\NewsLetterList;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $settings = Setting::first();
        try{
          Mail::send('news_letter',['email'=>$request->email],function($message) use( $settings){
                  $message->to($settings->settings->conact_email,$settings->settings->site_name)
                  ->subject('New Subscriber to newsletter ');
          });
        }
        catch (\Exception $exception){
            return response()->json('there is an error,please try later',500);
        }
        return response([
            'messae'=>'Thanks for subscribing to our NewsLetter'
        ],201);
    }
}
