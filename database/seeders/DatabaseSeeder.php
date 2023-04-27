<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::create([
            'name' =>'Test admin',
            'email' =>'admin123@gmail.com',
            'password' =>bcrypt('admin'),
            'phone' =>1234567890,
            'role' =>1,
            
         ]);
    }
}
