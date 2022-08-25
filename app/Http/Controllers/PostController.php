<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
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
        ->defaultSort('-created_at')
        ->filter(request()->only('search','sort'))
        ->latest();
        if($limit = request()->query('limit')){
            $articles =  new PostCollection($posts->paginate($limit));
        }
        $articles =  new PostCollection($posts->paginate(6));// dd(request()->all());
        return Inertia::render('Blog/Index',[
            'articles' => $articles,
            'tags' => Tag::all(),
            'categories' => Category::take(8)->get(),
            'sort' =>request()->sort ?? 'newest'
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
        return Inertia::render('Blog/Show',[
            'article'=>new PostResource($slug)
        ]);
    }
    public function relatedArticles(Post $post)
    {
        dd($post);
        $posts = Post::with('postable')
                ->filter(request()->only('search'))
                ->orWhere('category_id',$post->category_id)
                ->limit(request()->limit)
                ->get()
                ->map(function($post){
                    return [
                        'title'=>$post->title,
                        'title_en'=>$post->title_en,
                        'author'=>$post->postable->full_name,
                        'posted_at'=>Carbon::parse($this->created_at)->locale('en_US')->isoFormat('LL'),
                        'category_id'=> Category::find($post->category_id)
                    ];
                })
                ;
       return response()->json($posts,200);

    }

}
