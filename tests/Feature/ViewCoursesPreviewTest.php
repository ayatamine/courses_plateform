<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Course;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewCoursesPreviewTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $course = Course::create([
            'title'=>'عنا مثال',
            'title_en'=>"some title",
            'thumbnail'=>'course-12.jpg',
            'slug'=>"some-title-h6",
            'description'=>'بعض الوصف الخاص بقائمة التشغيل',
            'description_en'=>'some description of the playlist',
            'instructor_id'=>1,
        ]);
        //action
        $resp = $this->get("/api/courses/{$course->slug}");

        //assertions
        $resp->assertStatus(200);
        $resp->assertSee($course->title);
        $resp->assertSee($course->title_en);
        $resp->assertSee($course->slug);
        $resp->assertSee($course->description);
        $resp->assertSee($course->description_en);
    }
}
