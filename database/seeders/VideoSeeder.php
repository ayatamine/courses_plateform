<?php

namespace Database\Seeders;

use App\Models\Video;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Video::factory()
        ->has(Comment::factory()->count(3))
        ->times(10)->create();
    }
}
