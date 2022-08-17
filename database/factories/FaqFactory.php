<?php

namespace Database\Factories;

use App\Models\Faq;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class FaqFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Faq::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $question_en=$this->faker->text(200);
        return [
            'question'=>'هنا محتوى السءال بالعربية '.rand(0,10).' ?',
            'question_en'=>$this->faker->name(),
            'answer'=>'هنا محتوى الجواب بالعربية '.rand(0,10).'?',
            'answer_en'=>$question_en,
            'slug'=>Str::slug($question_en)
        ];
    }
}
