<?php

namespace App\Http\Controllers\Api\FrontEnd;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Posts\PostResource;
use App\Http\Resources\Posts\PostCollection;
use DB;
class PostController extends Controller
{
    public function index()
    {
        if($limit = request()->limit){
            return  new PostCollection(Post::inRandomOrder()->limit(1)->get());
        }
        if($oldest = request()->oldest){
            return  new PostCollection(Post::oldest()->paginate(6));
        }
            return  new PostCollection(Post::latest()->paginate(6));
    }
    public function show(Post $slug)
    {
         return new PostResource($slug);
    }
    public function relatedPosts( $slug)
    {
        $search =  str_replace('-',' ',$slug);
        $posts = Post::with('postable')
                ->where('title', 'like', '%'.$search.'%')
                ->limit(3)
                ->get()
                ->map(function($post){
                    return [
                        'title'=>$post->title,
                        'title_en'=>$post->title_en,
                        'thumbnail'=>$post->thumbnail,
                        'posted_by'=>$post->postable->full_name
                    ];
                })
                ;
       return response()->json($posts,200);

    }

}
