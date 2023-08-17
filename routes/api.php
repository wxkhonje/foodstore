<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ResturantController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentdetailController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\BusinessaddressController;
use App\Http\Controllers\BusinesstypeController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\EmailController;
use App\http\Controllers\AttributeController;
use App\http\Controllers\ProductAttributeValueController;
use App\http\Controllers\AddressController;
use App\http\Controllers\UserController;
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
Route::apiResource('/businessaddress', BusinessaddressController::class);   
Route::apiResource('/businesstype', BusinesstypeController::class);
Route::apiResource('/Businesscategory', CategorieController::class);
Route::apiResource('/product', ProductController::class);
Route::apiResource('/reviews', ReviewController::class);
Route::apiResource('/menus', MenuController::class);
Route::apiResource('/favourites', FavouriteController::class);
Route::apiResource('/orders', OrderController::class);
Route::apiResource('/carts', CartController::class);
Route::apiResource('/paymentdetails', PaymentdetailController::class);
Route::apiResource('/attributes', AttributeController::class);
Route::apiResource('/address', AddressController::class);
Route::apiResource('/Pav', ProductAttributeValueController::class);
Route::apiResource('/email',EmailController::class);

//Authentication routes
Route::apiResource('/login', AuthenticationController::class);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

//Individual Routes
//Route::apiResource('/userbusiness', BusinessController::class);
Route::post('/Search', SearchController::class);
Route::get('/userbusinesses/{id}', [BusinessController::class, 'UserBusinesses']);
Route::post('/GenericSearchBusinesses', [BusinessController::class, 'GenericSearchBusinesses']);
Route::get('/ProductToOrder/{ProductID}', [MenuController::class, 'ProductToOrder']);
Route::get('/Businessbycategory', [BusinessController::class, 'Businessbycategory']);
Route::post('/spike', [BusinessController::class, 'spike']);
Route::get('/FulltextBusinessSearch', [BusinessController::class, 'FulltextBusinessSearch']);
Route::get('/searchfoodstorepaginate', [ResturantController::class, 'searchfoodstorepaginateapi']);
Route::get('/ShowBusinessesMenus/{bussinessid}', [MenuController::class, 'ShowBusinessesMenus']);
Route::get('/ordersForUser/{userId}', [OrderController::class, 'ordersForUser']);

//Protected routes
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::post('/login', 'AuthController@login');

//protected group routes
Route::group(['middleware' => ['auth:sanctum']], function(){
    //Route::post('/logout', [AuthController::class, 'logout']);
    //
    //Route::post('/register', [AuthController::class, 'register']);
    //Route::apiResource('/user', UserController::class); 
});