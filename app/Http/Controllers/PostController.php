<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Tag;
use App\Models\Post;
use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\Redirect;
use App\Http\Resources\Posts\PostResource;
use App\Http\Resources\Posts\PostCollection;

class PostController extends Controller
{
    public function index(){
        $articles = [];
        $posts =QueryBuilder::for(Post::class)
        ->allowedFilters(['title','title_en'])
        ->allowedIncludes('tags')
        ->filter(request()->only('search'))
        ->latest();
        if($limit = request()->query('limit')){
            $articles =  new PostCollection($posts->paginate($limit));
        }
        $articles =  new PostCollection($posts->paginate(6));
        return Inertia::render('Blog/Index',[
            'articles' => $articles,
            'tags' => Tag::all(),
            'categories' => Category::take(8)->get(),
        ]);
    }
    public function articles()
    {

        $posts =QueryBuilder::for(Post::class)
        ->allowedFilters(['title','title_en'])
        ->allowedIncludes('tags')
        ->defaultSort('-created_at')
        ->allowedSorts('created_at')
        ->latest();
        if($limit = request()->query('limit')){
            return  new PostCollection($posts->paginate($limit));
        }
        return  new PostCollection($posts->paginate(6));
    }
    public function search(){
        // dd(request()->all());
        $posts = Post::filter(request()->only('search'))
        ->paginate(10)
        ->withQueryString();
        return Redirect::back()->with([
            'search' => request()->only('search'),
            'articles'=> new PostCollection($posts)
        ]);
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
