<?php

namespace App\Http\Controllers\Api\FrontEnd;

use App\Models\Faq;
use App\Models\Post;
use App\Models\User;
use App\Models\Setting;
use App\Models\Tutorial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;

class HomeController extends Controller
{
    public function settings(){
        return  new SettingResource(Setting::first());
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
}
