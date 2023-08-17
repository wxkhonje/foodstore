<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Get all business IDs from the 'businesses' table
        $businessIds = DB::table('businesses')->pluck('id')->toArray();     

        // Placeholder image URLs
        $imageUrls = [
            'chicken-4343402_1920.jpg',
            'chicken-4343402_1920.jpg',
            'chicken-4343402_1920.jpg',
            'chicken-4343402_1920.jpg',
            // Add more image URLs as needed
        ];

        // Generate random menus
        for ($i = 0; $i < 500; $i++) {

            $description = $faker->sentences(3, true); // Generate 3 sentences for the description

            // Truncate description to 40 words if needed
            $words = explode(' ', $description);
            if (count($words) > 40) {
                $description = implode(' ', array_slice($words, 0, 40));
            }

            DB::table('menus')->insert([
                'business_id' => $faker->randomElement($businessIds),
                'name' => $faker->words(3, true),
                'description' => $description,
                'price' => $faker->randomFloat(2, 5, 50),
                'image_path' => $faker->randomElement($imageUrls),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
