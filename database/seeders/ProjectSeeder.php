<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Project::create([
            'title'=>'بناء موقع',
            'title_en'=>'project 1',
            'owner'=>'ayat ahmed amine',
            'thumbnail'=>'b2.jpg',
            'skills'=>'laravel,vuejs'
        ]);
        \App\Models\Project::create([
            'title'=>'بناء نظام محاسبة',
            'title_en'=>'accountancy system 1',
            'owner'=>'ayat ahmed amine',
            'thumbnail'=>'b3.jpg',
            'skills'=>'laravel,vuejs,nuxtjs'
        ]);
    }
}
