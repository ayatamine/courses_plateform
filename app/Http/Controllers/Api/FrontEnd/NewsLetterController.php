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
        $subscribed_in_list =NewsLetterList::whereEmail($request->email)->first();
        if($subscribed_in_list){
            return response([
                'message'=>'already subscribed'
            ],200);
        }
        NewsLetterList::create([
             'email'=>$request->email
        ]);
        $settings = Setting::first();
        try{
          Mail::send('emails.new_news_letter_subscriber',['email'=>$request->email],function($message) use( $settings){
                  $message->to($settings->settings->contact_email)
                  ->subject('New Subscriber to newsletter');
          });
        }
        catch (\Exception $exception){
            return response()->json($exception,500);
        }
        return response([
            'message'=>'Thanks for subscribing to our NewsLetter'
        ],201);
    }
}
