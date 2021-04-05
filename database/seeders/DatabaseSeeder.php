<?php

namespace Database\Seeders;

use Database\Seeders\FaqSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\TeamSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\VideoSeeder;
use Database\Seeders\CourseSeeder;
use Database\Seeders\ReviewSeeder;
use Database\Seeders\SkillsSeeder;
use Database\Seeders\CommentSeeder;
use Database\Seeders\ProjectSeeder;
use Database\Seeders\ServiceSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\QuestionSeeder;
use Database\Seeders\ResponseSeeder;
use Database\Seeders\PlayListSectionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        // $this->call(CommentSeeder::class);
        $this->call(FaqSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(PlayListSectionSeeder::class);
        $this->call(VideoSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(SkillsSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(ResponseSeeder::class);
    }
}
