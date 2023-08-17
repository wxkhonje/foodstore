<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Supermarkets',
            'Grocery Stores',
            'Convenience Stores',
            'Farmers Markets',
            'Health Food Stores',
            'Specialty Food Stores',
            'Butcher Shops',
            'Fish Markets',
            'Bakeries',
            'Delicatessens (Delis)',
            'Cheese Shops',
            'Wine and Spirits Shops',
            'Tea and Coffee Shops',
            'Bulk Food Stores',
            'International Food Stores',
            'Ethnic Grocery Stores',
            'Organic Food Stores',
            'Gourmet Food Stores',
            'Frozen Food Stores',
            'Vegan/Vegetarian Food Stores',
            'Fast Food Restaurants',
            'Casual Dining Restaurants',
            'Fine Dining Restaurants',
            'Family-Style Restaurants',
            'Cafés and Bistros',
            'Food Trucks and Food Carts',
            'Buffet Restaurants',
            'Pizzerias',
            'Drive-through Shops',
            'Stop-Over Shops',
            'FoodTrucks',
            'Sushi Bars',
            'Seafood Restaurants',
            'Steakhouse Restaurants',
            'Barbecue (BBQ) Restaurants',
            'Indian Restaurants',
            'Chinese Restaurants',
            'African Local Restaurants',
            'Thai Restaurants',
            'Italian Restaurants',
            'Mexican Restaurants',
            'French Restaurants',
            'Japanese Restaurants',
            'Korean Restaurants',
            'Mediterranean Restaurants',
            'Middle Eastern Restaurants',
            'Vegetarian/Vegan Restaurants',
            'Gluten-Free Restaurants',
            'Breakfast and Brunch Restaurants',
            'Dessert and Ice Cream Shops',
            'Food Halls and Marketplaces',
            'Street Food Stalls',
            'Pop-up Restaurants and Supper Clubs',
            'Farm-to-Table Restaurants',            
            // Add more food shop categories as needed
        ];

        // Generate random food shop categories
        foreach ($categories as $category) {
            $description = $this->getRestaurantDescription($category);
            
            DB::table('categories')->insert([
                'name' => $category,
                'description' => $description,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

        // Helper method to generate restaurant-specific descriptions
        private function getRestaurantDescription($category)
        {
            $descriptions = [
                'A delightful '.$category.' offering a variety of delectable dishes in a cozy ambiance.',
                'Savor the flavors of our '.$category.' and experience a culinary journey like no other.',
                'Discover the perfect blend of taste and tradition at our charming '.$category.'.',
                'Tantalize your taste buds with our handcrafted delicacies at the finest '.$category.' in town.',
                // Add more restaurant-specific descriptions as needed
            ];
    
            return $descriptions[array_rand($descriptions)];
        }
}
