<?php

namespace Database\Seeders;

use App\Models\Setting;
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
           Setting::create([
            'settings' =>[
                "site_name"=>'coursatbarmaja',
                "contact_email"=>'contact@coursatbarmaja.com',
                "description"=>'Every developer need a real road to success in his career,
                 because of that we are here to provide the best and the clean way to 
                take you from beginner to middle to advanced developer.',
                "phone_number"=>'+2134568745',
                "address"=>'leghmara adrar',
                "logo"=>'logo-1633967597.svg',
                "logo_ar"=>'logo-ar-1633967597.svg',
                "facebook_link"=>'https://www.facebook.com/4arabdevelopers',
                "youtube_link"=>'https://www.youtube.com/c/4arabdevelopers',
                "instagram_link"=>'https://www.instagram.com/4arabdeveloper',
                "linkedin_link"=>'linkedin.com',
                "twitter_link"=>'twitter_link',
                "telegram_link"=>'telegram_link',
            ]
        ]);
    }
}
