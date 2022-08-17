<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Course\CourseResource;
use App\Http\Resources\Tutorials\TutorialResource;

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
    public function tutorials($category)
    {
        $tutorials = Category::whereSlug($category)->first()->tutorials;
        return response()->json(TutorialResource::collection($tutorials));
    }
    public function questions($question)
    {
        return response()->json(Category::with('questions')->whereSlug($question)->first());
    }
}
