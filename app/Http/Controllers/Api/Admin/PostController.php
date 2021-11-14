<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Posts\PostCollection;
use Image;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  Post::with('tags')->with('category')->latest()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        $filename ='';
        if($image = $request->file('thumbnail')){
            $extension = $image->getClientOriginalExtension();
            $filename  = 'post-thumbnail-' . time() . '.' . $extension;
            $imgFile = Image::make($image->getRealPath());
            $imgFile->backup();
            $thubmnail = $imgFile->resize(270, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode();
            Storage::put('/posts/thumbnails/'.$filename,$thubmnail);
            $imgFile->reset();
            $postImage = $imgFile->resize(790,null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode();
            Storage::put('posts/'.$filename,$postImage);
//            $path      = $thumbnail->storeAs('posts', $filename);

        }
        $post = post::create([
            'title'=>$request->title,
            'slug'=>Str::slug($request->title_en),
            'title_en'=>$request->title_en,
            'content'=>$request->content,
            'content_en'=>$request->content_en,
            'thumbnail'=>$filename,
            'category_id'=>$request->category_id,
            'postable_type'=>$request->postable_type,
            'postable_id'=>$request->postable_id,
            'keywords'=>$request->keywords
        ]);
        $tags = $request->tags;
        if($post){
          if(!!$request->tags && count($tags))  $this->saveRelation($post,$tags,'tag');

        }
        return response()->json(
            $post->load('category')->load('tags')
        );
    }
    function saveRelation($post,$tags){
        $post->tags()->sync([]);
        foreach($tags as $id){
          $tag = Tag::find($id);
          $post->tags()->save($tag);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->thumbnail = asset('storage/posts/'.$post->thumbnail);

        return    $post->load('category')
        ->load('tags');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $slug)
    {
        $post = Post::whereSlug($slug)->first();
        $filename =$post->thumbnail;
        if($thumbnail = $request->file('thumbnail')){
            Storage::delete('posts/'.$filename);
            $extension = $thumbnail->getClientOriginalExtension();
            $filename  = 'post-thumbnail-' . time() . '.' . $extension;
            $path      = $thumbnail->storeAs('posts', $filename);
        }
        $post->title = $request->title;
        if($post->title_en != $request->title_en){ $post->slug = Str::slug($request->title_en) ;} ;
        $post->title_en = $request->title_en;
        $post->content = $request->content;
        $post->content_en = $request->content_en;
        $post->thumbnail = $filename;
        $post->postable_type = $request->postable_type;
        $post->postable_id= $request->postable_id;
        $post->category_id= $request->category_id;
        $post->keywords= $request->keywords;
        $post->save();
        $tags = $request->tags;
        //save tags
        if(!!$request->tags && count($tags))  $this->saveRelation($post,$tags,'tag');

        return response()->json(
            $post->load('category')->load('tags')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json('the post deleted successfuly');
    }
}
