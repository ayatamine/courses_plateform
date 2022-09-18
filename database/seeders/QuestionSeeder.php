<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           $faker = Factory::create();

           Question::create([
            'title'=>'question 1',
            'slug'=>'question-1',
            'content'=>'here is the question 1 ?',
            'user_id'=>User::pluck('id')[$faker->numberBetween(1,User::count()-1)],
           ]);
          Question::create([
            'title'=>'question 2',
            'slug'=>'question-2',
            'content'=>'here is the question 2 ?',
            'user_id'=>User::pluck('id')[$faker->numberBetween(1,User::count()-1)],
           ]);
    }
}
