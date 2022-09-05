<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\NewsLetterList;
use Illuminate\Support\Facades\Mail;

class NewsLetterController extends Controller
{
   /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function subscribe(Request $request)
    {

        $this->validate($request,[
            'email'=>'required|string|email|unique:users'
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
                  $message->to($settings->settings['contact_email'])
                  ->subject('New Subscriber to newsletter');
          });
        }
        catch (Exception $exception){
            return response()->json($exception,500);
        }
        return response([
            'message'=>'Thanks for subscribing to our NewsLetter'
        ],201);
    }
    public function unsubscribe(Request $request)
    {

        $this->validate($request,[
            'email'=>'string|required|email|unique:users'
        ]);
        $subscribed_in_list =NewsLetterList::whereEmail($request->email)->first();
        if(!$subscribed_in_list){
            return response([
                'message'=>'No email record found according to the provided email'
            ],200);
        }
        $subscribed_in_list->delete();

        return response([
            'message'=>'Successfully unsubscribed from NewsLetter'
        ],201);
    }
}
