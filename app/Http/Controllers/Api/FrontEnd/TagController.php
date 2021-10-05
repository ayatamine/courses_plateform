<?php

namespace App\Http\Controllers\Api\FrontEnd;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Posts\PostCollection;
use App\Http\Resources\Course\CourseCollection;
use App\Http\Resources\Tutorials\TutorialResource;

class TagController extends Controller
{
    public function index(){
        return Tag::all();
    }
    public function posts($tag_id){
        $data = Tag::with('posts')->find($tag_id);
        return response()->json(new PostCollection($data->posts));
    }
    public function courses($tag_id){
        $courses = Tag::findorfail($tag_id)->courses;
        return response()->json(new CourseCollection($courses));
    }
    public function tutorials($tag_id)
    {
        $tutorials = Tag::findorfail
        ($tag_id)->tutorials;
        return response()->json(TutorialResource::collection($tutorials));
    }
}
