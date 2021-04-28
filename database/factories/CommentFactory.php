<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content'=>$this->faker->text(300),
            'parent_id'=>$this->faker->numberBetween(0,9),
            'commentable_id'=>rand(1,10),
            'commentable_type'=>'App\Models\Post',
            'vote_number'=>rand(0,20),
            'user_id'=>1,
            'user_type'=>'user'
        ];
    }
}
