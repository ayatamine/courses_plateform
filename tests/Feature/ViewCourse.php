<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Course;

class ViewCourse extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        // $response = $this->get('/');

        // $response->assertStatus(200);
        //arrangment
        $course = Course::create([
            'title'=>'عنا مثال',
            'title_en'=>"some title",
            'thumbnail'=>'course-12.jpg',
            'slug'=>"some-title",
            'description'=>'بعض الوصف الخاص بقائمة التشغيل',
            'description_en'=>'some description of the playlist',
            'instructor_id'=>1,
        ]);
        //action
        $resp = $this->get("/api/courses/{$course->id}");

        //assertions
        $resp->assertStatus(200);
        $resp->assertSee($post->title);
        $resp->assertSee($post->title_en);
        $resp->assertSee($post->description);
        $resp->assertSee($post->description_en);

    }
}
