<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Start inserting users');
        User::create([
            'first_name' => 'ahmed amine',
            'last_name' =>  'ayat',
            'email' => 'user@app.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // password
            'remember_token' => Str::random(10),
            'country'=>'dz',
            'sex'=>'male',
        ]);
        User::factory()->times(2)->create();
        $this->command->info('finish inserting users');
    }
}
