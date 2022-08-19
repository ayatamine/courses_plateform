<?php

namespace Database\Factories;

use App\Models\Tutorial;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TutorialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tutorial::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title_en = $this->faker->text(50);
        return [
           'title' => 'عنوان درس هنا '.rand(1,2),
           'title_en' => $title_en,
           'slug' => Str::slug($title_en),
           'thumbnail' => 'tutorial-thumbnail-1618404979 (3).PNG',
           'description' => 'بعض المحتوى للبوست هنا بسيب سيب سي ب سيب سي',
           'description_en' => $this->faker->text(300),
        ];
    }
}
