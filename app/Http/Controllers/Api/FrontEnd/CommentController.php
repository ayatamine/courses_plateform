<?php

namespace App\Http\Controllers\Api\FrontEnd;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function postComments(Post $post){

          return $post->root_comments;
          
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
    public function store(Request $request)
    {
    //    return $request->all();
        $this->validate($request,[
            'commentable_slug' =>'string|required',
            'content' =>'string|required|min:3',
            'commentable_type'=>'string|required',
            // 'commentable_id'=>'integer|required',
            'parent_id'=>'nullable|integer',
            'user_type'=>'required|string',
        ]);
        //user_id vote_number commentable_id

        $post = Post::whereSlug($request->commentable_slug)->first();

        $comment = new Comment();
        $comment->user_id = auth('sanctum')->user()->id;
        $comment->commentable_id = $post->id;
        $comment->content = $request->content;
        $comment->commentable_type = $request->commentable_type;
        $comment->parent_id = $request->parent_id;
        $comment->user_type = $request->user_type;
        $comment->vote_number = 0;

        $post->comments()->save($comment);
        return response()->json([
            'message' => 'comment added successfuly'
        ],201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
