<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title_en = $this->faker->text(50);
        return [
            'title'=>'عنوان بوست هنا '.rand(1,2),
            'title_en'=>$title_en,
            'thumbnail'=>'b1.jpg',
            'slug'=>Str::slug($title_en),
            'content'=>'بعض المحتوى للبوست هنا بسيب سيب سي ب سيب سي',
            'content_en'=>$this->faker->text(300),
            'category_id'=>rand(1,9),
            'postable_id'=>1,
            'postable_type'=>'App\Models\Instructor',
        ];
    }
}
