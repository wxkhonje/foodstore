<?php

use App\Http\Controllers\ResturantController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\BusinesstypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//public routes
//API Normal Laravel Routes
Route::apiResource('/gallery', GalleryController::class);
Route::apiResource('/resturant', ResturantController::class);
Route::apiResource('/business', BusinessController::class);
Route::apiResource('/businesstype', BusinesstypeController::class);


//Protected routes
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//protected group routes
Route::group(['middleware' => ['auth:sanctum']], function(){
    //Route::post('/logout', [AuthController::class, 'logout']);
    //Route::post('/login', [AuthController::class, 'login']);
    //Route::post('/register', [AuthController::class, 'register']);
    //Route::apiResource('/user', UserController::class);
});