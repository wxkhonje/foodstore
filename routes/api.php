<?php

use App\Http\Controllers\ResturantController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\BusinesstypeController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProductController;
use App\http\Controllers\AttributeController;
use App\http\Controllers\ProductAttributeValueController;
use App\http\Controllers\AddressController;
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
Route::apiResource('/productcategory', CategorieController::class);
Route::apiResource('/product', ProductController::class);
Route::apiResource('/attributes', AttributeController::class);
Route::apiResource('/address', AddressController::class);
Route::apiResource('/Pav', ProductAttributeValueController::class);


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