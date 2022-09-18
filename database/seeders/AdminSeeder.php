<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Start inserting admin');
        if(! app()->isProduction()){
            Admin::create([
                'id' => 1,
                'first_name' => 'Ayat',
                'last_name' =>  'Ahmed Amine',
                'email' => 'admin@app.com',
                'email_verified_at' => now(),
                'bio'=>'Certified web instructor & Developer',
                'password'=>bcrypt('password'),
                'remember_token' => Str::random(10),
            ]);
        }else{
            Admin::create([
                'id' => 1,
                'first_name' => 'Ayat',
                'last_name' =>  'Ahmed Amine',
                'email' => 'admin01@coursatbarmaja.com',
                'email_verified_at' => now(),
                'bio'=>'Certified web instructor & Developer',
                'password'=>bcrypt('1a2z3e4r'),
                'remember_token' => Str::random(10),
            ]);
        }
        $this->command->info('finish inserting admin');
    }
}
