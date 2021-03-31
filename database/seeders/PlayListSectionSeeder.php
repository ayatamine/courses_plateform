<?php

namespace Database\Seeders;

use App\Models\PlayListSection;
use Illuminate\Database\Seeder;

class PlayListSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \App\Models\PlayListSection::create([
           'id'=>1,
           'title'=>'مدخل ',
           'title_en'=>'intro',
           'playlist_id'=>1,
       ]);
       \App\Models\PlayListSection::create([
           'id'=>2,
           'title'=>'تنصيب الادوات ',
           'title_en'=>'installation ',
           'playlist_id'=>1,
       ]);
       \App\Models\PlayListSection::create([
           'id'=>3,
           'title'=>'مصادر ',
           'title_en'=>'more resource',
           'playlist_id'=>1,
       ]);
       \App\Models\PlayListSection::create([
           'id'=>4,
           'title'=>'مادا سنحتاج ؟ ',
           'title_en'=>'Needs & Tools',
           'playlist_id'=>2,
       ]);
       \App\Models\PlayListSection::create([
           'id'=>5,
           'title'=>'تفاصيل الدورة',
           'title_en'=>'Details of the course ',
           'playlist_id'=>2,
       ]);
       \App\Models\PlayListSection::create([
           'id'=>6,
           'title'=>'مصادر ',
           'title_en'=>'more resource',
           'playlist_id'=>2,
       ]);
    }
}
