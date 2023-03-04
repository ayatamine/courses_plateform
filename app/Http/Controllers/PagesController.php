<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,Page $slug)
    {
        return response()->json([
            'name'=>$slug->name,
            'name_en'=>$slug->name_en,
            'slug'=>$slug->slug,
            'content'=>$slug->content,
            'content_en'=>$slug->content_en,
        ],200);
    }
}