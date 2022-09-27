<?php

namespace App\Http\Controllers\Api\FrontEnd;

use DB;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\Posts\PostResource;
use App\Http\Resources\Posts\PostCollection;

class PostController extends Controller
{
    public function index()
    {

        $posts =QueryBuilder::for(Post::class)
        ->allowedFilters(['title','title_en'])
        ->allowedIncludes('tags')
        ->defaultSort('-created_at')
        ->allowedSorts('created_at')
        ->published()
        ->latest();
        if($limit = request()->query('limit')){
            return  new PostCollection($posts->paginate($limit));
        }
        return  new PostCollection($posts->paginate(6));
    }
    public function show(Post $slug)
    {
         return new PostResource($slug);
    }
    public function relatedPosts(Post $post)
    {
        $search =  $post->title;
        $posts = Post::with('postable')
                ->where('title_en', 'like', '%'.$search.'%')
                ->orWhere('category_id',$post->category_id)
                ->limit(5)
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
