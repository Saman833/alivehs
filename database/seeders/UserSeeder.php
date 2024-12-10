<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'saman20',
            'email' => 's.ahmadifar2020@gmail.com',
            'password' => bcrypt('thisworks'),
            'admin' => true, // Make this user an admin
        ]);
        User::factory()->count(100)->create();
    }
}
