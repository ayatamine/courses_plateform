<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin-api')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Page::all(),200);
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
        $this->validate($request,[
            'name'=>'required|string',
            'name_en'=>'required|string',
            'content'=>'required',
            'content_en'=>'required',
        ]);
        $page =Page::create([
            'name'=>$request->name,
            'name_en'=>$request->name_en,
            'slug'=>Str::slug($request->name_en),
            'content'=>$request->content,
            'content_en'=>$request->content_en
        ]);
        $page->name_en = $request->name_en;
        $page->save();
        return response()->json($page,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return response()->json($page,200);
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
    public function update(Request $request,Page $page)
    {

        $this->validate($request,[
            'content'=>'required',
            'content_en'=>'required',
        ]);
         $page->name = $request->name;
         $page->name_en =$request->name_en;
         $page->content =$request->content;
         $page->content_en =$request->content_en;
         $page->slug =Str::slug($request->name_en);
        $page->save();
        return response()->json($page,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {

        $page->delete();
        return response()->json(['message'=>'the page deleted successfuly']);
    }
}
