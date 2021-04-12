<?php

namespace App\Http\Controllers\Api\FrontEnd;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Posts\PostCollection;
use App\Http\Resources\Posts\PostResource;

class PostController extends Controller
{
    public function index()
    {
        return  new PostCollection(Post::latest()->paginate(6));
    }
    public function index2()
    {
        return  new PostCollection(Post::inRandomOrder()->get());
    }
    public function show(Post $slug)
    {

         return new PostResource($slug);
    }

}
