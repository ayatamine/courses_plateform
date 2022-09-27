<?php

namespace App\Http\Controllers\Api\FrontEnd;

use App\Models\Faq;
use App\Models\Post;
use App\Models\User;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\Tutorial;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;

class HomeController extends Controller
{
    public function __construct(){
        // $this->middleware('guest:api');
    }
    public function settings(){

        $settings = DB::table('site_settings')
                    ->get()
                    ->pluck('value','key');
         $settings['logo'] = asset('settings/'.$settings['logo']);
         $settings['logo_ar'] = asset('settings/'.$settings['logo_ar']);
         return $settings;

        
        
    }
    public function faqs(){
        return response()->json(Faq::latest()->get());
    }
    public function achivements(){
        return response()->json(
            [
                'total_courses'=>Tutorial::count(),
                'total_students'=>User::count(),
                'total_posts'=>Post::count()
            ]
        );
    }
    public function contact(ContactRequest $request){


          $contact = Contact::create([
              'first_name'=>$request->first_name,
              'last_name'=>$request->last_name,
              'message'=>$request->message,
              'phone'=>$request->phone,
              'email'=>$request->email,
          ]);
          try {
              $contact_email = Setting::first();
            Mail::to($contact_email->settings->contact_email)
            ->send(new ContactMail($contact));
            } catch (\Exception $e) {
                return response()->json('there is an error,please try later',500);
            }
           return response()->json(
               [
                   'message'=>'thanks for contacting us, we will reply to you soon.'
               ],200);
    }
}
