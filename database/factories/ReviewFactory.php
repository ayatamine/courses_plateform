<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content'=>$this->faker->text(200),
            'value'=>4.5,
            'user_id'=>User::pluck('id')[$this->faker->numberBetween(1,User::count()-1)],
            'course_id'=>1
        ];
    }
}
