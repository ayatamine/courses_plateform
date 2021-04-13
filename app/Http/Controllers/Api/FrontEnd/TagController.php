<?php

namespace App\Http\Controllers\Api\FrontEnd;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Posts\PostCollection;

class TagController extends Controller
{
    public function index(){
        return Tag::all();
    }
    public function posts($tag_id){
        $posts = Tag::with('posts')->find($tag_id);
        return response()->json($posts);
    }
    public function courses($tag_id){
        $courses = Tag::find($tag_id)->courses;
        return response()->json(new PostCollection($courses));
    }
}
