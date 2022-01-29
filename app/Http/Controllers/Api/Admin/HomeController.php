<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin-api');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return response()->json([
            'users'=>DB::table('users')->count(),
            'articles'=>DB::table('posts')->count(),
            'newsletterlist'=>DB::table('news_letter_lists')->count(),
            'courses'=>DB::table('courses')->count(),
            'tutorials'=>DB::table('tutorials')->count(),
            'projects'=>DB::table('projects')->count()
        ],200);
    }
}
