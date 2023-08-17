<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();

        // Get all user IDs from the 'menus' table
        $menuIds = DB::table('menus')->pluck('id')->toArray();
        $customerIds = DB::table('customers')->pluck('id')->toArray();

        // Generate random businesses
        for ($i = 0; $i < 1000; $i++) {

            $description = $faker->sentences(3, true); // Generate 3 sentences for the description

            // Truncate description to 40 words if needed
            $words = explode(' ', $description);
            if (count($words) > 30) {
                $description = implode(' ', array_slice($words, 0, 30));
            }

            DB::table('reviews')->insert([
                'menu_id' => $faker->randomElement($menuIds),
                'customer_id' => $faker->randomElement($customerIds),
                'product_name' => $faker->sentence(3),
                'product_description' => $description,
                'product_image' => $faker->imageUrl(),
                'rating_value' => $faker->randomFloat(1, 1, 5),
                'rating_best' => $faker->randomFloat(1, 4, 5),
                'rating_worst' => $faker->randomFloat(1, 1, 2),
                'author_name' => $faker->name,
                'date_published' => $faker->date,
                'review_body' => $faker->paragraphs(3, true),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


    }
}
