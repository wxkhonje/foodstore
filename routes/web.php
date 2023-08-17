<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\BusinessaddressController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FoodStoreController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ResturantController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FoodmenuController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SitestatisticController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\ProductAttributeValueController;
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
//Route::get('/login', [LoginController::class, 'login'])->name('/login');

Route::get('/Userlogin', function () {return view('auth.login');})->name('/Userlogin');

//Public Routes
Route::resource('/foodstore',FoodStoreController::class);
//Route::resource('Gallery', 'App\Http\Controllers\GalleryController');

//Private Routes
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource('/admin',AdminController::class);
    Route::resource('/attributes',AttributeController::class);
    Route::resource('/Pav',ProductAttributeValueController::class);
    Route::resource('/orders',OrderController::class);
    Route::resource('/carts',CartController::class);
    Route::resource('/gallery',GalleryController::class);
    Route::resource('/sitestatistics',SitestatisticController::class);
    Route::resource('/Menu',MenuController::class);
    Route::resource('/Products',ProductController::class);
    Route::resource('/Resturant',ResturantController::class);
    Route::resource('/foodmenu',FoodmenuController::class);
    Route::resource('/category', CategorieController::class);
    Route::resource('/business', BusinessController::class);
    Route::resource('/businessaddress', BusinessaddressController::class);
    Route::resource('/locations',LocationController::class);
    Route::resource('/users',UserController::class);
    Route::resource('/email',EmailController::class);
    Route::resource('/Authentication',AuthenticationController::class);
});
