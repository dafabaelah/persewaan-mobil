<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cars;
use App\Models\Category;
use App\Models\User;
use Database\Factories\CarsFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Daffa admin',
            'email' => 'daffaadmin@gmail.com',
            'password' => bcrypt('12345789'),
            'telephone' => '08123456789',
            'license' => '123456789',
            'address' => 'Jl. dafa no 1',
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Daffa user',
            'email' => 'daffauser@gmail.com',
            'password' => bcrypt('12345789'),
            'telephone' => '08123456789',
            'license' => '123456789',
            'address' => 'Jl. dafa no 2',
            'role' => 'user',
        ]);

        Cars::factory()->count(5)->create();
        Category::factory()->count(5)->create();
    }
}
