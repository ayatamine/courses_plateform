<?php

namespace App\Http\Controllers\Api\FrontEnd;

use App\Models\Faq;
use App\Models\Setting;
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
}
