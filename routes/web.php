<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\FoodStoreController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ResturantController;
use App\Mail\welcomemail;
use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Mail;


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

Route::get('/template', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*Route::get('/Resturants', function()
{

});*/

Route::get('/Resturants', [ResturantController::class, 'index']);
Route::get('/createbusiness', [ResturantController::class, 'create']);
Route::post('/addbusiness', [ResturantController::class, 'store']);

Route::get('/', [FoodStoreController::class, 'index']);
Route::get('/admin', [FoodStoreController::class, 'admin']);
Route::get('/Menu', [MenuController::class, 'index']);

Route::get('/oldui', function (){
    return view('welcome');
});

Route::post('/updateresturant/id',[ResturantController::class, 'edit']);

Route::get('/addbusiness', function (){return view('businesscreate');});
Route::get('/business', [BusinessController::class, 'index']);
Route::get('/orders', function (){return view('admin.orders');});
Route::get('/users', function (){return view('admin.users');});
Route::get('/sitestatistics', function (){return view('admin.sitestatistics');});

Route::get('/emails', function (){
    Mail::to('xavier.khonje@gmail.com')->send(new welcomemail());
    return new welcomemail();
});

Route::post('resturant',[FoodStoreController::class, 'store'])->name('resturanttest');

Route::resource('/adminbiz',BusinessController::class);

Route::post('/newbusiness',[BusinessController::class, 'store'])->name('newbusiness');
Route::resource('/locate',LocationController::class);
Route::get('/locations',[LocationController::class, 'index'])->name('location');
Route::post('/locations',[LocationController::class, 'store'])->name('savelocation');
