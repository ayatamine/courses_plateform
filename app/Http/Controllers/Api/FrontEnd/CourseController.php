<?php

namespace App\Http\Controllers\Api\FrontEnd;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\Course\CourseResource;
use App\Http\Resources\Course\CourseCollection;

class CourseController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $courses =QueryBuilder::for(Course::class)
        ->allowedFilters(['title','title_en','level','price'])
        ->allowedIncludes('skills','tags','categories')
        ->defaultSort('-created_at')
        ->allowedSorts('created_at')
        ->paginate(6);
        return  new CourseCollection($courses);
    }
    public function show(Course $slug)
    {
         return new CourseResource($slug);
    }
    public function search(){

        return response()->json(request());
    }
}
