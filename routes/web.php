<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\FoodStoreController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ResturantController;
use App\Http\Controllers\AdminController;
use App\http\Controllers\UserController;
use App\http\Controllers\FoodmenuController;
use App\http\Controllers\EmailController;
use App\http\Controllers\AuthenticationController;
use App\http\Controllers\OrderController;
use App\http\Controllers\GalleryController;
use App\http\Controllers\SitestatisticController;
use App\http\Controllers\ProductController;
use App\http\Controllers\AttributeController;
use App\http\Controllers\ProductAttributeValueController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

//Entry Route for Front End

Route::get('/', [FoodStoreController::class, 'index'])->name('/');

//Public Routes
Route::resource('/foodstore',FoodStoreController::class);

//Private Routes
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource('/admin',AdminController::class);
    Route::resource('/attributes',AttributeController::class);
    Route::resource('/Pav',ProductAttributeValueController::class);
    Route::resource('/orders',AdminController::class);
    Route::resource('/gallery',GalleryController::class);
    Route::resource('/sitestatistics',SitestatisticController::class);
    Route::resource('/Menu',MenuController::class);
    Route::resource('/Products',ProductController::class);
    Route::resource('/Resturant',ResturantController::class);
    Route::resource('/foodmenu',FoodmenuController::class);
    Route::resource('/business', BusinessController::class);
    Route::resource('/locations',LocationController::class);
    Route::resource('/users',UserController::class);
    Route::resource('/email',EmailController::class);
    Route::resource('/Authentication',AuthenticationController::class);
});
