<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\business>
 */
class BusinessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'category'=>$this->faker->randomElement([
                "Foodtruck","Resturant",
                "Cafes","Bakeries",
                "SweetShops","TakeAway",
                "BeverageShops","Bars",
                "IceCreamShops","StreetFoods",
                "DessertShops"
            ]),
            'location'=>$this->faker->country(),
            'PhysicalAddress'=>$this->faker->address(),
            'longitude'=>$this->faker->numberBetween(4058676,34345354),
            'latitude'=>$this->faker->numberBetween(4058676,34345354),
            'contactperson'=>$this->faker->name(),
            'email'=>$this->faker->email(),
            'cellnumber'=>$this->faker->numberBetween(111111,999999),
            'facebookhandle'=>$this->faker->shuffleString,
            'instagramhandle'=>$this->faker->shuffleString,
        ];
    }
}
