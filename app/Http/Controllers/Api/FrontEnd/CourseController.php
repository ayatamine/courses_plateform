<?php

namespace App\Http\Controllers\Api\FrontEnd;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        return  new CourseCollection(Course::paginate(6));
    }
    public function show(Course $slug)
    {
         return new CourseResource($slug);
    }
}
