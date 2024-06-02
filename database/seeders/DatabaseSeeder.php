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

        // Cars::factory()->count(5)->create();
        // Category::factory()->count(5)->create();

        $categories = [
            'Hatchback',
            'Sedan',
            'SUV',
            'MPV',
            'City Car',
            'Crossover',
            'Pick-up',
            'Van',
            'Sport Car',
            'Convertible'
        ];

        foreach ($categories as $category) {
            Category::create([
                'category_name' => $category,
            ]);
        }

        $carsData = [
            [
                'category_id' => 1,
                'cars_description' => 'Hatchback Description',
                'cars_price' => 100000,
                'cars_image' => 'https://via.placeholder.com/150',
                'cars_brand' => 'Hatchback Brand',
                'cars_model' => 'Hatchback Model',
                'cars_nopol' => 'AB 1234 CD',
            ],
            [
                'category_id' => 2,
                'cars_description' => 'Sedan Description',
                'cars_price' => 200000,
                'cars_image' => 'https://via.placeholder.com/150',
                'cars_brand' => 'Sedan Brand',
                'cars_model' => 'Sedan Model',
                'cars_nopol' => 'CD 1234 EF',
            ],
            [
                'category_id' => 3,
                'cars_description' => 'SUV Description',
                'cars_price' => 300000,
                'cars_image' => 'https://via.placeholder.com/150',
                'cars_brand' => 'SUV Brand',
                'cars_model' => 'SUV Model',
                'cars_nopol' => 'EF 1234 GH',
            ],
            [
                'category_id' => 4,
                'cars_description' => 'MPV Description',
                'cars_price' => 400000,
                'cars_image' => 'https://via.placeholder.com/150',
                'cars_brand' => 'MPV Brand',
                'cars_model' => 'MPV Model',
                'cars_nopol' => 'GH 1234 IJ',
            ],
            [
                'category_id' => 5,
                'cars_description' => 'City Car Description',
                'cars_price' => 500000,
                'cars_image' => 'https://via.placeholder.com/150',
                'cars_brand' => 'City Car Brand',
                'cars_model' => 'City Car Model',
                'cars_nopol' => 'IJ 1234 KL',
            ],
            [
                'category_id' => 6,
                'cars_description' => 'Crossover Description',
                'cars_price' => 600000,
                'cars_image' => 'https://via.placeholder.com/150',
                'cars_brand' => 'Crossover Brand',
                'cars_model' => 'Crossover Model',
                'cars_nopol' => 'KL 1234 MN',
            ],
            [
                'category_id' => 7,
                'cars_description' => 'Pick-up Description',
                'cars_price' => 700000,
                'cars_image' => 'https://via.placeholder.com/150',
                'cars_brand' => 'Pick-up Brand',
                'cars_model' => 'Pick-up Model',
                'cars_nopol' => 'MN 1234 OP',
            ],
            [
                'category_id' => 8,
                'cars_description' => 'Van Description',
                'cars_price' => 800000,
                'cars_image' => 'https://via.placeholder.com/150',
                'cars_brand' => 'Van Brand',
                'cars_model' => 'Van Model',
                'cars_nopol' => 'OP 1234 QR',
            ],
            [
                'category_id' => 9,
                'cars_description' => 'Sport Car Description',
                'cars_price' => 900000,
                'cars_image' => 'https://via.placeholder.com/150',
                'cars_brand' => 'Sport Car Brand',
                'cars_model' => 'Sport Car Model',
                'cars_nopol' => 'QR 1234 ST',
            ],
            [
                'category_id' => 10,
                'cars_description' => 'Convertible Description',
                'cars_price' => 1000000,
                'cars_image' => 'https://via.placeholder.com/150',
                'cars_brand' => 'Convertible Brand',
                'cars_model' => 'Convertible Model',
                'cars_nopol' => 'ST 1234 UV',
            ],
        ];

        foreach ($carsData as $car) {
            Cars::create($car);
        }
    }
}
