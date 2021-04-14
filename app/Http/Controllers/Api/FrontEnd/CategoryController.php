<?php

namespace App\Http\Controllers\Api\FrontEnd;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Course\CourseResource;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(Category::latest()->get());
    }
    public function courses($category)
    {
        $courses = Category::whereSlug($category)->first()->courses;
        return response()->json(CourseResource::collection($courses));
    }
    public function tutorials($tutorial)
    {
        return response()->json(Category::with('tutorials')->whereSlug($tutorial)->first());
    }
    public function questions($question)
    {
        return response()->json(Category::with('questions')->whereSlug($question)->first());
    }
}
