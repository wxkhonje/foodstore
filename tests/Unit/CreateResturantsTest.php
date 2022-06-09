<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\business;
use App\Http\Controllers\ResturantController;

class CreateResturantsTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_meal_calculation()
    {
        $ResturantController = new ResturantController();
        $Amount = $ResturantController->CalculatePrice();
        $this->assertEquals(200, $Amount);
    }
}
