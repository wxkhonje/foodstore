<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Faker\Factory as Faker;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Get all category IDs from the 'categories' table
        $categoryIds = DB::table('categories')->pluck('id')->toArray();

        // Get all user IDs from the 'users' table
        $userIds = DB::table('users')->pluck('id')->toArray();

        // Define the pre-defined image path
        $predefinedImagePath = 'chicken-4343402_1920.jpg';

        // Generate random businesses
        for ($i = 0; $i < 100; $i++) {

            $description = $faker->sentences(3, true); // Generate 3 sentences for the description

            // Truncate description to 40 words if needed
            $words = explode(' ', $description);
            if (count($words) > 40) {
                $description = implode(' ', array_slice($words, 0, 40));
            }

            DB::table('businesses')->insert([
                'user_id' => $faker->randomElement($userIds),
                'category_id' => $faker->randomElement($categoryIds),
                'name' => $faker->company,
                'description' => $description,
                'image_path' => $predefinedImagePath,
                'category' => $faker->randomElement(['Restaurant', 'Food Truck', 'Cafe', 'Bakery', 'Fast Food', 'Pizzeria']),
                'contactperson' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'cellnumber' => $faker->phoneNumber,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
