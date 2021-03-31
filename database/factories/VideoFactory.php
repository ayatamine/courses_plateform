<?php

namespace Database\Factories;

use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Video::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>'اسم الفيديو بالعربي '.rand(0,10),
            'title_en'=>$this->faker->name,
            'duration'=>rand(1,30),
            'section_id'=>rand(1,5)
        ];
    }
}
