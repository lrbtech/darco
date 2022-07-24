<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\PageController::class, 'home']);
Route::get('/home', [App\Http\Controllers\PageController::class, 'home']);
Route::get('/about-us', [App\Http\Controllers\PageController::class, 'about']);
Route::get('/contact-us', [App\Http\Controllers\PageController::class, 'contact']);
Route::get('/individual-register', [App\Http\Controllers\PageController::class, 'individualregister']);
Route::get('/professional-register', [App\Http\Controllers\PageController::class, 'professionalregister']);

Route::post('/save-individual-register', [App\Http\Controllers\PageController::class, 'saveindividualregister']);
Route::post('/save-professional-register', [App\Http\Controllers\PageController::class, 'saveprofessionalregister']);

Route::post('/send-vendor-enquiry', [App\Http\Controllers\PageController::class, 'sendvendorenquiry']);
Route::post('/save-vendor-enquiry', [App\Http\Controllers\PageController::class, 'savevendorenquiry']);

Route::get('/product-list', [App\Http\Controllers\PageController::class, 'productlist']);
Route::get('/product-details/{id}', [App\Http\Controllers\PageController::class, 'productdetails']);


Route::get('cart', [App\Http\Controllers\CartController::class, 'cartlist']);
Route::post('add-cart', [App\Http\Controllers\CartController::class, 'addtocart']);
Route::get('update-cart/{product_id}/{qty}', [App\Http\Controllers\CartController::class, 'updatecart']);
Route::get('remove-cart/{id}', [App\Http\Controllers\CartController::class, 'removecart']);
Route::get('clear-cart', [App\Http\Controllers\CartController::class, 'clearallcart']);

Route::get('checkout', [App\Http\Controllers\CheckoutController::class, 'checkout']);

Route::get('/view-shipping-address', [App\Http\Controllers\CheckoutController::class, 'viewshippingaddress']);
Route::post('/save-shipping-address', [App\Http\Controllers\CheckoutController::class, 'saveshippingaddress']);

Route::post('/save-order', [App\Http\Controllers\CheckoutController::class, 'saveorder']);

Route::get('/online-pay', [App\Http\Controllers\CheckoutController::class, 'onlinepay']);

Route::get('/order-success', [App\Http\Controllers\CheckoutController::class, 'ordersuccess']);

Route::get('/print-invoice/{id}', [App\Http\Controllers\PageController::class, 'printinvoice']);




Route::get('/get-sub-category/{id}', [App\Http\Controllers\PageController::class, 'getsubcategory']);
Route::get('/get-professional-sub-category/{id}', [App\Http\Controllers\PageController::class, 'getprofessionalsubcategory']);

Route::get('/get-menu', [App\Http\Controllers\PageController::class, 'getMenu']);
Route::get('/track-order', [App\Http\Controllers\PageController::class, 'orderTrack']);
Route::get('/category/{id}', [App\Http\Controllers\PageController::class, 'shopCategory']);

Route::get('/get-ideas', [App\Http\Controllers\PageController::class, 'getIdeas']);
Route::get('/professional-list', [App\Http\Controllers\PageController::class, 'professionalList']);
Route::get('/product-list', [App\Http\Controllers\PageController::class, 'productlList']);

Auth::routes();

Route::group(['prefix' => 'professionals'],function(){

	Route::get('/lists', [App\Http\Controllers\PageController::class, 'professionalslist']);
	Route::get('/overview/{id}', [App\Http\Controllers\PageController::class, 'overview']);

});

Route::group(['prefix' => 'admin'],function(){

	Route::get('/login', [App\Http\Controllers\AdminLogin\LoginController::class, 'showLoginForm'])->name('admin.login');
	Route::post('/login', [App\Http\Controllers\AdminLogin\LoginController::class, 'login'])->name('admin.login.submit');
	Route::post('/logout', [App\Http\Controllers\AdminLogin\LoginController::class, 'logout'])->name('admin.logout');

	Route::post('/password/email', [App\Http\Controllers\AdminLogin\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
	Route::get('/password/reset', [App\Http\Controllers\AdminLogin\ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
	Route::post('/password/reset', [App\Http\Controllers\AdminLogin\ResetPasswordController::class, 'reset']);
	Route::get('/password/reset/{token}', [App\Http\Controllers\AdminLogin\ResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');

	Route::get('/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'dashboard'])->name('admin.dashboard');

	Route::get('/orders', [App\Http\Controllers\Admin\OrderController::class, 'orders']);
    Route::POST('/get-orders', [App\Http\Controllers\Admin\OrderController::class, 'getorders']);
    Route::get('/change-order-status/{id}/{status}', [App\Http\Controllers\Admin\OrderController::class, 'changeorderstatus']);
	Route::get('/view-order/{id}', [App\Http\Controllers\Admin\OrderController::class, 'vieworder']);



	Route::get('/customer', [App\Http\Controllers\Admin\CustomerController::class, 'customer']);
    Route::POST('/get-customer', [App\Http\Controllers\Admin\CustomerController::class, 'getcustomer']);
    Route::get('/delete-customer/{id}/{status}', [App\Http\Controllers\Admin\CustomerController::class, 'deletecustomer']);

	Route::get('/customer-details/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'customerdetails']);

	Route::get('/vendor', [App\Http\Controllers\Admin\BusinessController::class, 'vendor']);
    Route::POST('/get-vendor', [App\Http\Controllers\Admin\BusinessController::class, 'getvendor']);
    Route::get('/delete-vendor/{id}/{status}', [App\Http\Controllers\Admin\BusinessController::class, 'deletevendor']);

	Route::get('/vendor-details/{id}', [App\Http\Controllers\Admin\BusinessController::class, 'vendordetails']);


	//category
	Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'category']);
	Route::POST('/save-category', [App\Http\Controllers\Admin\CategoryController::class, 'savecategory']);
	Route::POST('/update-category', [App\Http\Controllers\Admin\CategoryController::class, 'updatecategory']);
	Route::get('/edit-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'editcategory']);
	Route::get('/delete-category/{id}/{status}', [App\Http\Controllers\Admin\CategoryController::class, 'deletecategory']);


	Route::get('/reviews', [App\Http\Controllers\Admin\ReviewsController::class, 'reviews']);
	Route::get('/reviews-status/{id}/{status}', [App\Http\Controllers\Admin\ReviewsController::class, 'reviewsstatus']);



	//subcategory
	Route::get('/subcategory/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'subcategory']);
	Route::POST('/save-subcategory', [App\Http\Controllers\Admin\CategoryController::class, 'savesubcategory']);
	Route::POST('/update-subcategory', [App\Http\Controllers\Admin\CategoryController::class, 'updatesubcategory']);
	Route::get('/edit-subcategory/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'editsubcategory']);
	Route::get('/delete-subcategory/{id}/{status}', [App\Http\Controllers\Admin\CategoryController::class, 'deletesubcategory']);


	Route::get('/professional-category', [App\Http\Controllers\Admin\CategoryController::class, 'professionalcategory']);
	Route::POST('/save-professional-category', [App\Http\Controllers\Admin\CategoryController::class, 'saveprofessionalcategory']);
	Route::POST('/update-professional-category', [App\Http\Controllers\Admin\CategoryController::class, 'updateprofessionalcategory']);
	Route::get('/edit-professional-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'editprofessionalcategory']);
	Route::get('/delete-professional-category/{id}/{status}', [App\Http\Controllers\Admin\CategoryController::class, 'deleteprofessionalcategory']);

	Route::get('/professional-subcategory/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'professionalsubcategory']);
	Route::POST('/save-professional-subcategory', [App\Http\Controllers\Admin\CategoryController::class, 'saveprofessionalsubcategory']);
	Route::POST('/update-professional-subcategory', [App\Http\Controllers\Admin\CategoryController::class, 'updateprofessionalsubcategory']);
	Route::get('/edit-professional-subcategory/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'editprofessionalsubcategory']);
	Route::get('/delete-professional-subcategory/{id}/{status}', [App\Http\Controllers\Admin\CategoryController::class, 'deleteprofessionalsubcategory']);
	


    Route::get('/change-password', [App\Http\Controllers\Admin\SettingsController::class, 'changepassword']);
    Route::POST('/update-password', [App\Http\Controllers\Admin\SettingsController::class, 'updatepassword']);

	Route::get('/privacy-policy', [App\Http\Controllers\Admin\SettingsController::class, 'privacypolicy']);
    Route::POST('/update-privacy-policy', [App\Http\Controllers\Admin\SettingsController::class, 'updateprivacypolicy']);

	Route::get('/terms-and-conditions', [App\Http\Controllers\Admin\SettingsController::class, 'termsandconditions']);
    Route::POST('/update-terms-and-conditions', [App\Http\Controllers\Admin\SettingsController::class, 'updatetermsandconditions']);

	Route::get('/users', [App\Http\Controllers\Admin\SettingsController::class, 'users']);
	Route::POST('save-user', [App\Http\Controllers\Admin\SettingsController::class, 'saveuser']);
	Route::get('edit-user/{id}', [App\Http\Controllers\Admin\SettingsController::class, 'edituser']);
	Route::POST('update-user', [App\Http\Controllers\Admin\SettingsController::class, 'updateuser']);
	Route::get('delete-user/{id}/{status}', [App\Http\Controllers\Admin\SettingsController::class, 'deleteuser']);




	Route::get('backup', [App\Http\Controllers\Admin\BackupController::class, 'index']);
	Route::get('backup/create', [App\Http\Controllers\Admin\BackupController::class, 'create']);
	Route::get('backup/download/{file_name}', [App\Http\Controllers\Admin\BackupController::class, 'download']);
	Route::get('backup/delete/{file_name}', [App\Http\Controllers\Admin\BackupController::class, 'delete']);


    
});

Route::group(['prefix' => 'vendor'],function(){

	Route::get('/login', [App\Http\Controllers\VendorLogin\LoginController::class, 'showLoginForm'])->name('vendor.login');
	Route::post('/login', [App\Http\Controllers\VendorLogin\LoginController::class, 'login'])->name('vendor.login.submit');
	Route::post('/logout', [App\Http\Controllers\VendorLogin\LoginController::class, 'logout'])->name('vendor.logout');

	Route::post('/password/email', [App\Http\Controllers\VendorLogin\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('vendor.password.email');
	Route::get('/password/reset', [App\Http\Controllers\VendorLogin\ForgotPasswordController::class, 'showLinkRequestForm'])->name('vendor.password.request');
	Route::post('/password/reset', [App\Http\Controllers\VendorLogin\ResetPasswordController::class, 'reset']);
	Route::get('/password/reset/{token}', [App\Http\Controllers\VendorLogin\ResetPasswordController::class, 'showResetForm'])->name('vendor.password.reset');

	Route::get('/dashboard', [App\Http\Controllers\Vendor\HomeController::class, 'dashboard'])->name('vendor.dashboard');

	Route::get('/orders', [App\Http\Controllers\Vendor\OrderController::class, 'orders']);
    Route::POST('/get-orders', [App\Http\Controllers\Vendor\OrderController::class, 'getorders']);
    Route::get('/change-order-status/{id}/{status}', [App\Http\Controllers\Vendor\OrderController::class, 'changeorderstatus']);
	Route::get('/view-order/{id}', [App\Http\Controllers\Vendor\OrderController::class, 'vieworder']);


	Route::get('/customer', [App\Http\Controllers\Vendor\CustomerController::class, 'customer']);
    Route::POST('/get-customer', [App\Http\Controllers\Vendor\CustomerController::class, 'getcustomer']);
    Route::get('/delete-customer/{id}/{status}', [App\Http\Controllers\Vendor\CustomerController::class, 'deletecustomer']);

	Route::get('/vendor', [App\Http\Controllers\Vendor\BusinessController::class, 'vendor']);
    Route::POST('/get-vendor', [App\Http\Controllers\Vendor\BusinessController::class, 'getvendor']);
    Route::get('/delete-vendor/{id}/{status}', [App\Http\Controllers\Vendor\BusinessController::class, 'deletevendor']);

	//product
	Route::get('/add-product', [App\Http\Controllers\Vendor\ProductController::class, 'addproduct']);
	Route::get('/product', [App\Http\Controllers\Vendor\ProductController::class, 'product']);
	Route::POST('/save-product', [App\Http\Controllers\Vendor\ProductController::class, 'saveproduct']);
	Route::POST('/update-product', [App\Http\Controllers\Vendor\ProductController::class, 'updateproduct']);
	Route::get('/edit-product/{id}', [App\Http\Controllers\Vendor\ProductController::class, 'editproduct']);
	Route::get('/delete-product/{id}/{status}', [App\Http\Controllers\Vendor\ProductController::class, 'deleteproduct']);
	Route::get('/delete-product-image/{id}', [App\Http\Controllers\Vendor\ProductController::class, 'deleteproductimage']);
	Route::get('/delete-product-attribute/{id}', [App\Http\Controllers\Vendor\ProductController::class, 'deleteproductattribute']);


	Route::get('/reviews', [App\Http\Controllers\Vendor\ReviewsController::class, 'reviews']);
	Route::get('/reviews-status/{id}/{status}', [App\Http\Controllers\Vendor\ReviewsController::class, 'reviewsstatus']);


	Route::get('/add-project', [App\Http\Controllers\Vendor\SettingsController::class, 'addproject']);
	Route::get('/project', [App\Http\Controllers\Vendor\SettingsController::class, 'project']);
	Route::POST('/save-project', [App\Http\Controllers\Vendor\SettingsController::class, 'saveproject']);
	Route::POST('/update-project', [App\Http\Controllers\Vendor\SettingsController::class, 'updateproject']);
	Route::get('/edit-project/{id}', [App\Http\Controllers\Vendor\SettingsController::class, 'editproject']);
	Route::get('/delete-project/{id}', [App\Http\Controllers\Vendor\SettingsController::class, 'deleteproject']);
	Route::get('/delete-project-image/{id}', [App\Http\Controllers\Vendor\SettingsController::class, 'deleteprojectimage']);


	Route::get('/idea-book', [App\Http\Controllers\Vendor\SettingsController::class, 'ideabook']);
	Route::POST('/save-idea-book', [App\Http\Controllers\Vendor\SettingsController::class, 'saveideabook']);
	Route::POST('/update-idea-book', [App\Http\Controllers\Vendor\SettingsController::class, 'updateideabook']);
	Route::get('/edit-idea-book/{id}', [App\Http\Controllers\Vendor\SettingsController::class, 'editideabook']);
	Route::get('/delete-idea-book/{id}', [App\Http\Controllers\Vendor\SettingsController::class, 'deleteideabook']);

	Route::get('/idea-book-images/{id}', [App\Http\Controllers\Vendor\SettingsController::class, 'ideabookimages']);
	Route::POST('/save-idea-book-images', [App\Http\Controllers\Vendor\SettingsController::class, 'saveideabookimages']);
	Route::get('/delete-idea-book-images/{id}', [App\Http\Controllers\Vendor\SettingsController::class, 'deleteideabookimages']);


	Route::get('/about-us', [App\Http\Controllers\Vendor\SettingsController::class, 'aboutus']);
    Route::POST('/update-about-us', [App\Http\Controllers\Vendor\SettingsController::class, 'updateaboutus']);

	Route::get('/profile', [App\Http\Controllers\Vendor\SettingsController::class, 'profile']);
    Route::POST('/update-profile', [App\Http\Controllers\Vendor\SettingsController::class, 'updateprofile']);

    Route::get('/change-password', [App\Http\Controllers\Vendor\SettingsController::class, 'changepassword']);
    Route::POST('/update-password', [App\Http\Controllers\Vendor\SettingsController::class, 'updatepassword']);

	Route::get('/attributes', [App\Http\Controllers\Vendor\ProductController::class, 'attributes']);
	Route::POST('/save-attributes', [App\Http\Controllers\Vendor\ProductController::class, 'saveattributes']);
	Route::POST('/update-attributes', [App\Http\Controllers\Vendor\ProductController::class, 'updateattributes']);
	Route::get('/edit-attributes/{id}', [App\Http\Controllers\Vendor\ProductController::class, 'editattributes']);
	Route::get('/delete-attributes/{id}', [App\Http\Controllers\Vendor\ProductController::class, 'deleteattributes']);

	Route::get('/attribute-fields/{id}', [App\Http\Controllers\Vendor\ProductController::class, 'attributefields']);
	Route::POST('/save-attribute-fields', [App\Http\Controllers\Vendor\ProductController::class, 'saveattributefields']);
	Route::POST('/update-attribute-fields', [App\Http\Controllers\Vendor\ProductController::class, 'updateattributefields']);
	Route::get('/edit-attribute-fields/{id}', [App\Http\Controllers\Vendor\ProductController::class, 'editattributefields']);
	Route::get('/delete-attribute-fields/{id}', [App\Http\Controllers\Vendor\ProductController::class, 'deleteattributefields']);

	Route::get('/product-group', [App\Http\Controllers\Vendor\ProductController::class, 'productgroup']);
	Route::POST('/save-product-group', [App\Http\Controllers\Vendor\ProductController::class, 'saveproductgroup']);
	Route::POST('/update-product-group', [App\Http\Controllers\Vendor\ProductController::class, 'updateproductgroup']);
	Route::get('/edit-product-group/{id}', [App\Http\Controllers\Vendor\ProductController::class, 'editproductgroup']);
	Route::get('/delete-product-group/{id}', [App\Http\Controllers\Vendor\ProductController::class, 'deleteproductgroup']);
	
	// product attr
	Route::get('/product-attr/{id}', [App\Http\Controllers\Vendor\ProductController::class, 'productAttr']);

});


Route::group(['prefix' => 'customer'],function(){
	Route::get('/profile', [App\Http\Controllers\Customer\HomeController::class, 'profile']);
	Route::get('/change-password', [App\Http\Controllers\Customer\HomeController::class, 'changepassword']);
    Route::get('/orders', [App\Http\Controllers\Customer\HomeController::class, 'orders']);

	Route::get('/track-order/{id}', [App\Http\Controllers\Customer\OrderController::class, 'trackorder']);


	Route::get('/manage-address', [App\Http\Controllers\Customer\ProfileController::class, 'manageaddress']);
    Route::get('/save-address', [App\Http\Controllers\Customer\ProfileController::class, 'saveaddress']);


	Route::get('/favourites', [App\Http\Controllers\Customer\FavouriteController::class, 'favourites']);
	Route::get('/save-favourites/{id}', [App\Http\Controllers\Customer\FavouriteController::class, 'savefavourites']);
    Route::get('/delete-favourites/{id}', [App\Http\Controllers\Customer\FavouriteController::class, 'deletefavourites']);


    Route::POST('/update-password', [App\Http\Controllers\Customer\HomeController::class, 'updatepassword']);
	Route::POST('/update-profile', [App\Http\Controllers\Customer\HomeController::class, 'updateprofile']);

});