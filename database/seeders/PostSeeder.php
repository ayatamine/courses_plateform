<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory()
        ->has(Tag::factory()->count(3))
        ->has(Comment::factory()->count(3))
        ->times(10)->create();
    }
}
