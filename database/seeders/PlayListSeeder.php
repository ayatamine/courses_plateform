<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\PlayList;
use Illuminate\Database\Seeder;

class PlayListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlayList::factory()
        ->has(Tag::factory()->count(3))
        ->times(10)->create();
    }
}
