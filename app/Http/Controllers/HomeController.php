<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Course;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\Tutorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\Posts\PostCollection;
use App\Http\Resources\Tutorials\TutorialCollection;

class HomeController extends Controller
{
    public function index(){
        $courses = Course::select(['title','title_en','description','description_en','slug',"thumbnail"])
                  ->withCount('students')
                  ->latest()
                  ->take(4)
                  ->get();
        return Inertia::render('Home/Index',[
            'courses' => $courses
        ]);
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
    public function contact(Request $request){

          $this->validate($request,[
             'first_name'=>'required|string|max:20',
             'last_name'=>'required|string|max:20',
             'message'=>'required|string|min:60',
             'phone'=>'regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:14',
             'email'=>'required|email'
          ]);
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
            } catch (Exception $e) {
                return response()->json('there is an error,please try later',500);
            }
           return response()->json(
               [
                   'message'=>'thanks for contacting us, we will reply to you soon.'
               ],200);
    }
}
