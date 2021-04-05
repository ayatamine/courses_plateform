<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Skill::create([
            'name'=>'laravel',
            'slug'=>'laravel'
        ]);
        \App\Models\Skill::create([
            'name'=>'vue js',
            'slug'=>'vue-js'
        ]);
        \App\Models\Skill::create([
            'name'=>'nuxt js',
            'slug'=>'nuxt-js'
        ]);
        \App\Models\Skill::create([
            'name'=>'javascript es6',
            'slug'=>'javascript-es6'
        ]);
    }
}
