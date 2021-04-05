<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles=['learn laravel','learn laravel with vue js','learn laravel with nuxt js'];

        \App\Models\Course::create([
            'id'=>1,
            'title'=>'تعلم لارافال',
            'title_en'=>$titles[0],
            'thumbnail'=>'course-13.jpg',
            'slug'=>Str::slug($titles[0]),
            'description'=>'بعض الوصف الخاص بقائمة التشغيل',
            'description_en'=>'some description of the playlist',
            'author_id'=>1,
        ]);
        \App\Models\Course::create([
            'id'=>2,
            'title'=>'تعلم فيوجس مع لارافال',
            'title_en'=>$titles[1],
            'slug'=>Str::slug($titles[1]),
            'thumbnail'=>'course-14.jpg',
            'description'=>'بعض الوصف الخاص بقائمة التشغيل',
            'description_en'=>'some description of the playlist',
            'author_id'=>1,
        ]);
        \App\Models\Course::create([
            'id'=>3,
            'title'=>'تعلم nuxt js مع لارافال',
            'title_en'=>$titles[2],
            'thumbnail'=>'course-12.jpg',
            'slug'=>Str::slug($titles[2]),
            'description'=>'بعض الوصف الخاص بقائمة التشغيل',
            'description_en'=>'some description of the playlist',
            'author_id'=>1,
        ]);
    }
}
