<?php

namespace Database\Seeders;

use App\Models\Response;
use Illuminate\Database\Seeder;

class ResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Response::create([
            'content'=>'',
            'question_id'=>rand(1,2),
            'user_id'=>1,
        ]);
    }
}
