<?php

namespace Database\Factories;

use App\Models\PlayList;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayListFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PlayList::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => 'دورة تعلم لارافال '.rand(0,9),
            'title_en' => $this->faker->name,
            'course_id'=>rand(1,2)
        ];
    }
}
