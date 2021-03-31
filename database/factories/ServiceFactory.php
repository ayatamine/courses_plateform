<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name_en = $this->faker->text(40);
        return [
            'name'=>'الخدمة '.rand(1,10),
            'name_en'=>$name_en,
            'slug'=>Str::slug($name_en),
            'image'=>'b'.rand(1,3).'.jpg',
            'description'=>'بعض النص هنا يبسي ب بب يسب بسيبسيب  ب  س ب سيبسي بب',
            'description_en'=>$this->faker->text(200),
        ];
    }
}
