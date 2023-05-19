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

    Route::post('/login', [App\Http\Controllers\Api\CustomerApiController::class, 'login']);

    Route::post('/create-customer', [App\Http\Controllers\Api\CustomerApiController::class, 'createcustomer']);

    Route::get('/get-app-slider', [App\Http\Controllers\Api\CustomerApiController::class, 'getappslider']);

    Route::get('/get-city', [App\Http\Controllers\Api\CustomerApiController::class, 'getcity']);
    Route::get('/get-area/{id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getarea']);

    Route::get('/get-ideas-category', [App\Http\Controllers\Api\CustomerApiController::class, 'getideascategory']);
    Route::get('/get-ideas-sub-category/{id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getideassubcategory']);
    Route::get('/get-ideas-same-category/{id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getideassamecategory']);

    Route::get('/get-professional-category', [App\Http\Controllers\Api\CustomerApiController::class, 'getprofessionalcategory']);
    Route::get('/get-professional-sub-category/{id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getprofessionalsubcategory']);
    Route::get('/get-professional-same-category/{id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getprofessionalsamecategory']);


    Route::get('/get-shop-category', [App\Http\Controllers\Api\CustomerApiController::class, 'getshopcategory']);
    Route::get('/get-shop-sub-category/{id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getshopsubcategory']);
    

    Route::post('/product-filter', [App\Http\Controllers\Api\CustomerApiController::class, 'productfilter']);
    Route::get('/get-products/{sub_category}/{child_category}', [App\Http\Controllers\Api\CustomerApiController::class, 'getproducts']);
    Route::get('/get-products-with-favourites/{sub_category}/{child_category}/{customer_id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getproductswithfavourites']);

    Route::get('/get-product-details/{id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getproductdetails']);
    Route::get('/get-product-additional-info/{id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getproductadditionalinfo']);
    Route::get('/get-product-specifications/{id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getproductspecifications']);
    Route::get('/get-product-images/{id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getproductimages']);
    Route::get('/get-product-attributes/{group_id}/{product_id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getproductattributes']);
    Route::get('/get-product-attributes-value/{group_id}/{attribute_id}/{product_id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getproductattributesvalue']);
    Route::post('/get-attributes-product', [App\Http\Controllers\Api\CustomerApiController::class, 'getattributesproduct']);

    Route::get('/get-related-products/{id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getrelatedproducts']);


    Route::get('/get-professional-list/{sub_category}', [App\Http\Controllers\Api\CustomerApiController::class, 'getprofessionallist']);
    Route::get('/get-professional-details/{id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getprofessionaldetails']);
    Route::get('/get-professional-images/{id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getprofessionalimages']);

    Route::get('/get-related-projects/{id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getrelatedprojects']);

    Route::get('/get-vendor-idea-books/{id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getvendorideabooks']);


    Route::get('/get-idea-book/{sub_category}', [App\Http\Controllers\Api\CustomerApiController::class, 'getideabook']);
    Route::get('/get-idea-book-details/{id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getideabookdetails']);
    Route::get('/get-idea-book-images/{id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getideabookimages']);

    Route::get('/get-related-idea-books/{id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getrelatedideabooks']);

    Route::post('/send-vendor-enquiry', [App\Http\Controllers\Api\CustomerApiController::class, 'sendvendorenquiry']);


    Route::get('/get-cart/{user_id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getcart']);
    Route::post('/save-cart', [App\Http\Controllers\Api\CustomerApiController::class, 'savecart']);
    Route::post('/update-cart', [App\Http\Controllers\Api\CustomerApiController::class, 'updatecart']);
    Route::post('/delete-cart', [App\Http\Controllers\Api\CustomerApiController::class, 'deletecart']);
    Route::post('/cart-local-to-server', [App\Http\Controllers\Api\CustomerApiController::class, 'cartlocaltoserver']);

    Route::get('/get-favourites/{user_id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getfavourites']);
    Route::post('/save-favourites', [App\Http\Controllers\Api\CustomerApiController::class, 'savefavourites']);
    Route::post('/delete-favourites', [App\Http\Controllers\Api\CustomerApiController::class, 'deletefavourites']);
    Route::get('/get-products-favourites/{product_id}/{customer_id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getproductsfavourites']);



    Route::get('/get-favourites-idea/{user_id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getfavouritesidea']);
    Route::post('/save-favourites-idea', [App\Http\Controllers\Api\CustomerApiController::class, 'savefavouritesidea']);
    Route::post('/delete-favourites-idea', [App\Http\Controllers\Api\CustomerApiController::class, 'deletefavouritesidea']);

    Route::get('/get-shipping-address/{user_id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getshippingaddress']);
    Route::post('/save-shipping-address', [App\Http\Controllers\Api\CustomerApiController::class, 'saveshippingaddress']);
    Route::post('/update-shipping-address', [App\Http\Controllers\Api\CustomerApiController::class, 'updateshippingaddress']);
    Route::post('/delete-shipping-address', [App\Http\Controllers\Api\CustomerApiController::class, 'deleteshippingaddress']);

    Route::post('/apply-coupon', [App\Http\Controllers\Api\CustomerApiController::class, 'applycoupon']);

    Route::post('/create-order', [App\Http\Controllers\Api\CustomerApiController::class, 'saveorder']);

    Route::get('/view-orders/{customer_id}', [App\Http\Controllers\Api\CustomerApiController::class, 'vieworders']);
    Route::get('/view-order-item/{id}', [App\Http\Controllers\Api\CustomerApiController::class, 'vieworderitem']);
    Route::post('/order-cancel', [App\Http\Controllers\Api\CustomerApiController::class, 'ordercancel']);
    Route::get('/get-cancel-reason', [App\Http\Controllers\Api\CustomerApiController::class, 'getcancelreason']);


    Route::get('/get-profile/{customer_id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getprofile']);
    Route::post('/update-profile', [App\Http\Controllers\Api\CustomerApiController::class, 'updateprofile']);


    Route::get('/get-vendor-enquiry/{customer_id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getvendorenquiry']);
    Route::get('/get-ship-address/{order_id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getShipAddress']);


    Route::get('/get-return-reason', [App\Http\Controllers\Api\CustomerApiController::class, 'getreturnreason']);
    Route::post('/save-return-item', [App\Http\Controllers\Api\CustomerApiController::class, 'savereturnitem']);
    Route::get('/get-return-item/{customer_id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getreturnitem']);
    Route::get('/return-item-cancel/{return_item_id}', [App\Http\Controllers\Api\CustomerApiController::class, 'returnitemcancel']);

    //chat
    Route::get('/get-vendor-chat/{id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getvendorchat']);
    Route::post('/save-vendor-chat', [App\Http\Controllers\Api\CustomerApiController::class, 'savevendorchat']);


    //review
    Route::POST('/save-review', [App\Http\Controllers\Api\CustomerApiController::class, 'savereview']);
    Route::get('/get-review/{product_id}', [App\Http\Controllers\Api\CustomerApiController::class, 'getreview']);

});

