<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Course\CourseResource;
use App\Http\Resources\Course\CourseCollection;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  new CourseCollection(Course::paginate(10));
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
    public function store(CourseRequest $request)
    {
        $filename ='';
        if($thumbnail = $request->file('thumbnail')){
            $extension = $thumbnail->getClientOriginalExtension();
            $filename  = 'course-thumbnail-' . time() . '.' . $extension;
            $path      = $thumbnail->storeAs('courses', $filename);
        }
        $course = Course::create([
            'title'=>$request->title,
            'slug'=>Str::slug($request->title_en),
            'title_en'=>$request->title_en,
            'description'=>$request->description,
            'description_en'=>$request->description_en,
            'thumbnail'=>$filename,
            'price'=>$request->price ?? 0,
            'instructor_id'=>$request->instructor_id
        ]);
        return new CourseResource($course);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return new CourseResource($course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, $slug)
    {

        $course = Course::whereSlug($slug)->first();
        $filename =$course->thumbnail;
        if($thumbnail = $request->file('thumbnail')){
            Storage::delete('courses/'.$filename);
            $extension = $thumbnail->getClientOriginalExtension();
            $filename  = 'course-thumbnail-' . time() . '.' . $extension;
            $path      = $thumbnail->storeAs('courses', $filename);
        }
        $course->title = $request->title;
        $course->slug = Str::slug($request->title_en);
        $course->title_en = $request->title_en;
        $course->description = $request->description;
        $course->description_en = $request->description_en;
        $course->thumbnail = $filename;
        $course->price = $request->price ?? 0;
        $course->instructor_id = $request->instructor_id;
        $course->save();
        return new CourseResource($course);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
