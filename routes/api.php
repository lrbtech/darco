<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['prefix' => 'customer'],function(){

    Route::post('/login', [App\Http\Controllers\Api\CustomerApiController::class, 'userLogin']);

    Route::post('/create-customer', [App\Http\Controllers\Api\CustomerApiController::class, 'createcustomer']);

    Route::get('/get-city', [App\Http\Controllers\Api\CustomerApiController::class, 'getcity']);
    Route::get('/get-area/{id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getarea']);

    Route::get('/get-ideas-category', [App\Http\Controllers\Api\CustomerApiController::class, 'getideascategory']);
    Route::get('/get-ideas-sub-category/{id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getideassubcategory']);

    Route::get('/get-professional-category', [App\Http\Controllers\Api\CustomerApiController::class, 'getprofessionalcategory']);
    Route::get('/get-professional-sub-category/{id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getprofessionalsubcategory']);

    Route::get('/get-shop-category', [App\Http\Controllers\Api\CustomerApiController::class, 'getshopcategory']);
    Route::get('/get-shop-sub-category/{id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getshopsubcategory']);
    

    Route::get('/get-products', [App\Http\Controllers\Api\CustomerApiController::class, 'getproducts']);
    Route::get('/get-product-details/{id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getproductdetails']);
    Route::get('/get-product-attributes/{id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getproductattributes']);

});

