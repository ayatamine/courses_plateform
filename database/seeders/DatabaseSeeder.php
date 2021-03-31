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
use Database\Seeders\CommentSeeder;
use Database\Seeders\ProjectSeeder;
use Database\Seeders\ServiceSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\PlayListSeeder;
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
        $this->call(PlayListSeeder::class);
        $this->call(PlayListSectionSeeder::class);
        $this->call(VideoSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(ProjectSeeder::class);
    }
}
