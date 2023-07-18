<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


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
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return 'optimize cleared';
});

// session(
// 	['theme' => 'light'],
// 	['cookies' => '0'],
// 	['lang' => 'english']
// );
Session::put('lang', 'english');
Session::put('theme', 'light');
Session::put('cookies', 0);

Route::get('/update-language/{lang}', [App\Http\Controllers\HomeController::class, 'updatelanguage']);
Route::get('/update-theme/{theme}', [App\Http\Controllers\HomeController::class, 'updatetheme']);
Route::get('/update-cookies/{cookies}', [App\Http\Controllers\HomeController::class, 'updatecookies']);

Route::get('/customer-login/{id}', [App\Http\Controllers\PageController::class, 'customerlogin']);
Route::get('/vendor-login/{id}', [App\Http\Controllers\PageController::class, 'vendorlogin']);

Route::get('/viewattributefilter', [App\Http\Controllers\HomeController::class, 'viewattributefilter']);

Route::get('/', [App\Http\Controllers\PageController::class, 'home']);
Route::get('/home', [App\Http\Controllers\PageController::class, 'home']);
Route::get('/get-home-sub-category/{id}', [App\Http\Controllers\HomeController::class, 'gethomesubcategory']);

Route::get('/get-ideas-category', [App\Http\Controllers\HomeController::class, 'getideascategory']);
Route::get('/professional-category', [App\Http\Controllers\HomeController::class, 'professionalcategory']);
Route::get('/shop-category', [App\Http\Controllers\HomeController::class, 'shopcategory']);


Route::get('/about-us', [App\Http\Controllers\PageController::class, 'about']);
Route::get('/contact-us', [App\Http\Controllers\PageController::class, 'contact']);
Route::get('/individual-register', [App\Http\Controllers\PageController::class, 'individualregister']);
Route::get('/professional-register', [App\Http\Controllers\PageController::class, 'professionalregister']);

Route::post('/save-individual-register', [App\Http\Controllers\PageController::class, 'saveindividualregister']);
Route::post('/save-professional-register', [App\Http\Controllers\PageController::class, 'saveprofessionalregister']);

// Route::get('/send-verify-mail/{id}', [App\Http\Controllers\PageController::class, 'sendverifymail']);
Route::get('/verify-account/{id}', [App\Http\Controllers\PageController::class, 'verifyaccount']);
Route::get('/verify-vendor-account/{id}', [App\Http\Controllers\PageController::class, 'verifyvendoraccount']);


Route::post('/send-vendor-enquiry', [App\Http\Controllers\PageController::class, 'sendvendorenquiry']);
Route::post('/save-vendor-enquiry', [App\Http\Controllers\PageController::class, 'savevendorenquiry']);

Route::get('qrcode-add-to-card/{id}', [App\Http\Controllers\CartController::class, 'qrcodeaddtocard']);

Route::get('cart', [App\Http\Controllers\CartController::class, 'cartlist']);
Route::post('add-cart', [App\Http\Controllers\CartController::class, 'addtocart']);
Route::get('update-cart/{product_id}/{qty}', [App\Http\Controllers\CartController::class, 'updatecart']);
Route::get('remove-cart/{id}', [App\Http\Controllers\CartController::class, 'removecart']);
Route::get('clear-cart', [App\Http\Controllers\CartController::class, 'clearallcart']);

Route::get('checkout', [App\Http\Controllers\CheckoutController::class, 'checkout']);

Route::get('/view-shipping-address', [App\Http\Controllers\CheckoutController::class, 'viewshippingaddress']);
Route::post('/save-shipping-address', [App\Http\Controllers\CheckoutController::class, 'saveshippingaddress']);

Route::post('/save-order', [App\Http\Controllers\CheckoutController::class, 'saveorder']);

Route::get('/online-pay/{order_id}/{invoice_id}', [App\Http\Controllers\CheckoutController::class, 'onlinepay']);

Route::get('/payment-success', [App\Http\Controllers\CheckoutController::class, 'paymentsuccess']);
Route::get('/payment-failed', [App\Http\Controllers\CheckoutController::class, 'paymentfailed']);

Route::get('/mobile-payment-success', [App\Http\Controllers\HomeController::class, 'mobilepaymentsuccess']);
Route::get('/mobile-payment-failed', [App\Http\Controllers\HomeController::class, 'mobilepaymentfailed']);

Route::get('/mobile-loader', [App\Http\Controllers\HomeController::class, 'mobileloader']);

Route::get('/print-invoice/{id}', [App\Http\Controllers\PageController::class, 'printinvoice']);



Route::get('/get-area/{id}', [App\Http\Controllers\PageController::class, 'getarea']);
Route::get('/get-sub-category/{id}', [App\Http\Controllers\PageController::class, 'getsubcategory']);
Route::get('/get-professional-sub-category/{id}', [App\Http\Controllers\PageController::class, 'getprofessionalsubcategory']);
Route::get('/get-idea-book-sub-category/{id}', [App\Http\Controllers\PageController::class, 'getideabooksubcategory']);

Route::get('/get-menu', [App\Http\Controllers\PageController::class, 'getMenu']);
Route::get('/track-order', [App\Http\Controllers\PageController::class, 'orderTrack']);
Route::get('/category/{id}', [App\Http\Controllers\PageController::class, 'shopCategory']);

//info pages
Route::get('/pages/{id}', [App\Http\Controllers\PageController::class, 'infoPages']);



Route::get('/ideas-details/{id}', [App\Http\Controllers\PageController::class, 'ideasDetails']);

Route::get('/product-list/{category}/{subcategory}/{subsubcategory}/{search}', [App\Http\Controllers\ProductListController::class, 'productlist']);
Route::POST('/load-data-product-list', [App\Http\Controllers\ProductListController::class, 'loaddataproductlist']);

Route::get('/search-product-list/{category}/{subcategory}/{subsubcategory}/{search}', [App\Http\Controllers\ProductListController::class, 'searchproductlist']);

Route::post('/save-review', [App\Http\Controllers\ProductListController::class, 'savereview']);
Route::post('/update-review', [App\Http\Controllers\ProductListController::class, 'updatereview']);

Route::get('/get-sub-category-product/{id}', [App\Http\Controllers\ProductListController::class, 'getsubcategoryproduct']);
Route::get('/get-sub-sub-category/{id}', [App\Http\Controllers\ProductListController::class, 'getsubsubcategory']);
Route::get('/product-details/{id}', [App\Http\Controllers\ProductListController::class, 'productdetails']);

Route::get('/professional-list/{category}/{subcategory}/{search}', [App\Http\Controllers\ProfessionalListController::class, 'professionallist']);
Route::get('/get-professional-sub-category-view/{id}', [App\Http\Controllers\ProfessionalListController::class, 'getprofessionalsubcategory']);

Route::get('/professional-details/{id}', [App\Http\Controllers\ProfessionalListController::class, 'professionaldetails']);

Route::get('/get-ideas/{category}/{subcategory}/{search}', [App\Http\Controllers\IdeasListController::class, 'getideas']);
Route::get('/get-idea-sub-category-view/{id}', [App\Http\Controllers\IdeasListController::class, 'getideasubcategory']);
Route::get('/get-idea-details/{id}', [App\Http\Controllers\IdeasListController::class, 'getideadetails']);

//coupon
Route::POST('/apply-coupon', [App\Http\Controllers\CheckoutController::class, 'applyCoupon']);


Auth::routes();

Route::group(['prefix' => 'professionals'],function(){

	Route::get('/lists', [App\Http\Controllers\PageController::class, 'professionalslist']);
	Route::get('/overview/{id}', [App\Http\Controllers\PageController::class, 'overview']);

});

Route::group(['prefix' => 'admin'],function(){

	Route::get('/login', [App\Http\Controllers\AdminLogin\LoginController::class, 'showLoginForm'])->name('admin.login');
	Route::post('/login', [App\Http\Controllers\AdminLogin\LoginController::class, 'login'])->name('admin.login.submit');
	Route::post('/logout', [App\Http\Controllers\HomeController::class, 'adminlogout'])->name('admin.logout');

	Route::post('/password/email', [App\Http\Controllers\AdminLogin\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
	Route::get('/password/reset', [App\Http\Controllers\AdminLogin\ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
	Route::post('/password/reset', [App\Http\Controllers\AdminLogin\ResetPasswordController::class, 'reset']);
	Route::get('/password/reset/{token}', [App\Http\Controllers\AdminLogin\ResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');

	Route::get('/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'dashboard'])->name('admin.dashboard');

	Route::get('/orders', [App\Http\Controllers\Admin\OrderController::class, 'orders']);
    Route::POST('/get-orders', [App\Http\Controllers\Admin\OrderController::class, 'getorders']);
    Route::get('/change-order-status/{id}/{status}', [App\Http\Controllers\Admin\OrderController::class, 'changeorderstatus']);
	Route::get('/view-order/{id}', [App\Http\Controllers\Admin\OrderController::class, 'vieworder']);


	Route::get('/return-item', [App\Http\Controllers\Admin\OrderController::class, 'returnitem']);
    Route::POST('/get-return-item', [App\Http\Controllers\Admin\OrderController::class, 'getreturnitem']);




	Route::get('/customer', [App\Http\Controllers\Admin\CustomerController::class, 'customer']);
    Route::POST('/get-customer', [App\Http\Controllers\Admin\CustomerController::class, 'getcustomer']);
    Route::get('/delete-customer/{id}/{status}', [App\Http\Controllers\Admin\CustomerController::class, 'deletecustomer']);

	Route::get('/customer-details/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'customerdetails']);

	Route::get('/vendor', [App\Http\Controllers\Admin\BusinessController::class, 'vendor']);
    Route::POST('/get-vendor', [App\Http\Controllers\Admin\BusinessController::class, 'getvendor']);
    Route::get('/delete-vendor/{id}/{status}', [App\Http\Controllers\Admin\BusinessController::class, 'deletevendor']);

	Route::get('edit-commission/{id}', [App\Http\Controllers\Admin\BusinessController::class, 'editcommission']);
	Route::POST('update-commission', [App\Http\Controllers\Admin\BusinessController::class, 'updatecommission']);
	Route::get('/vendor-details/{id}', [App\Http\Controllers\Admin\BusinessController::class, 'vendordetails']);


	//category
	Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'category']);
	Route::POST('/save-category', [App\Http\Controllers\Admin\CategoryController::class, 'savecategory']);
	Route::POST('/update-category', [App\Http\Controllers\Admin\CategoryController::class, 'updatecategory']);
	Route::get('/edit-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'editcategory']);
	Route::get('/delete-category/{id}/{status}', [App\Http\Controllers\Admin\CategoryController::class, 'deletecategory']);


	Route::get('/product-reviews', [App\Http\Controllers\Admin\ReviewsController::class, 'productreviews']);
	// Route::get('/reviews-status/{id}/{status}', [App\Http\Controllers\Admin\ReviewsController::class, 'reviewsstatus']);



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


	Route::get('/idea-category', [App\Http\Controllers\Admin\CategoryController::class, 'ideacategory']);
	Route::POST('/save-idea-category', [App\Http\Controllers\Admin\CategoryController::class, 'saveideacategory']);
	Route::POST('/update-idea-category', [App\Http\Controllers\Admin\CategoryController::class, 'updateideacategory']);
	Route::get('/edit-idea-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'editideacategory']);
	Route::get('/delete-idea-category/{id}/{status}', [App\Http\Controllers\Admin\CategoryController::class, 'deleteideacategory']);

	Route::get('/idea-subcategory/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'ideasubcategory']);
	Route::POST('/save-idea-subcategory', [App\Http\Controllers\Admin\CategoryController::class, 'saveideasubcategory']);
	Route::POST('/update-idea-subcategory', [App\Http\Controllers\Admin\CategoryController::class, 'updateideasubcategory']);
	Route::get('/edit-idea-subcategory/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'editideasubcategory']);
	Route::get('/delete-idea-subcategory/{id}/{status}', [App\Http\Controllers\Admin\CategoryController::class, 'deleteideasubcategory']);

	
	//country
	Route::get('/country', [App\Http\Controllers\Admin\CityController::class, 'Country']);
    Route::POST('/save-country', [App\Http\Controllers\Admin\CityController::class, 'saveCountry']);
    Route::POST('/update-country', [App\Http\Controllers\Admin\CityController::class, 'updateCountry']);
    Route::get('/edit-country/{id}', [App\Http\Controllers\Admin\CityController::class, 'editCountry']);
    Route::get('/country-delete/{id}/{status}', [App\Http\Controllers\Admin\CityController::class, 'deleteCountry']);

	Route::get('/city/{id}', [App\Http\Controllers\Admin\SettingsController::class, 'city']);
	Route::POST('/save-city', [App\Http\Controllers\Admin\SettingsController::class, 'savecity']);
	Route::POST('/update-city', [App\Http\Controllers\Admin\SettingsController::class, 'updatecity']);
	Route::get('/edit-city/{id}', [App\Http\Controllers\Admin\SettingsController::class, 'editcity']);
	Route::get('/delete-city/{id}/{status}', [App\Http\Controllers\Admin\SettingsController::class, 'deletecity']);

	Route::get('/area/{id}', [App\Http\Controllers\Admin\SettingsController::class, 'area']);
	Route::POST('/save-area', [App\Http\Controllers\Admin\SettingsController::class, 'savearea']);
	Route::POST('/update-area', [App\Http\Controllers\Admin\SettingsController::class, 'updatearea']);
	Route::get('/edit-area/{id}', [App\Http\Controllers\Admin\SettingsController::class, 'editarea']);
	Route::get('/delete-area/{id}/{status}', [App\Http\Controllers\Admin\SettingsController::class, 'deletearea']);

	Route::get('/mobile-ad', [App\Http\Controllers\Admin\SettingsController::class, 'mobilead']);
	Route::POST('/save-mobile-ad', [App\Http\Controllers\Admin\SettingsController::class, 'savemobilead']);
	Route::POST('/update-mobile-ad', [App\Http\Controllers\Admin\SettingsController::class, 'updatemobilead']);
	Route::get('/edit-mobile-ad/{id}', [App\Http\Controllers\Admin\SettingsController::class, 'editmobilead']);
	Route::get('/delete-mobile-ad/{id}/{status}', [App\Http\Controllers\Admin\SettingsController::class, 'deletemobilead']);


	//package
	Route::get('/package', [App\Http\Controllers\Admin\PackageController::class, 'package']);
	Route::POST('/save-package', [App\Http\Controllers\Admin\PackageController::class, 'savepackage']);
	Route::POST('/update-package', [App\Http\Controllers\Admin\PackageController::class, 'updatepackage']);
	Route::get('/edit-package/{id}', [App\Http\Controllers\Admin\PackageController::class, 'editpackage']);
	Route::get('/delete-package/{id}/{status}', [App\Http\Controllers\Admin\PackageController::class, 'deletepackage']);
	



    // Route::get('/change-password', [App\Http\Controllers\Admin\SettingsController::class, 'changepassword']);
    // Route::POST('/update-password', [App\Http\Controllers\Admin\SettingsController::class, 'updatepassword']);

	Route::get('/privacy-policy', [App\Http\Controllers\Admin\SettingsController::class, 'privacypolicy']);
    Route::POST('/update-privacy-policy', [App\Http\Controllers\Admin\SettingsController::class, 'updateprivacypolicy']);

	Route::get('/terms-and-conditions', [App\Http\Controllers\Admin\SettingsController::class, 'termsandconditions']);
    Route::POST('/update-terms-and-conditions', [App\Http\Controllers\Admin\SettingsController::class, 'updatetermsandconditions']);

	Route::get('/about-us', [App\Http\Controllers\Admin\SettingsController::class, 'aboutus']);
    Route::POST('/update-about-us', [App\Http\Controllers\Admin\SettingsController::class, 'updateaboutus']);

	Route::get('/vendor-guide', [App\Http\Controllers\Admin\SettingsController::class, 'vendorguide']);
    Route::POST('/update-vendor-guide', [App\Http\Controllers\Admin\SettingsController::class, 'updatevendorguide']);

	Route::get('/professional-guide', [App\Http\Controllers\Admin\SettingsController::class, 'professionalguide']);
    Route::POST('/update-professional-guide', [App\Http\Controllers\Admin\SettingsController::class, 'updateprofessionalguide']);

	Route::get('/purchase-guide', [App\Http\Controllers\Admin\SettingsController::class, 'purchaseguide']);
    Route::POST('/update-purchase-guide', [App\Http\Controllers\Admin\SettingsController::class, 'updatepurchaseguide']);

	Route::get('/delivery-information', [App\Http\Controllers\Admin\SettingsController::class, 'deliveryinformation']);
    Route::POST('/update-delivery-information', [App\Http\Controllers\Admin\SettingsController::class, 'updatedeliveryinformation']);

	Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'users']);
	Route::POST('save-user', [App\Http\Controllers\Admin\UserController::class, 'saveuser']);
	Route::get('edit-user/{id}', [App\Http\Controllers\Admin\UserController::class, 'edituser']);
	Route::POST('update-user', [App\Http\Controllers\Admin\UserController::class, 'updateuser']);
	Route::get('delete-user/{id}', [App\Http\Controllers\Admin\UserController::class, 'deleteuser']);

	Route::get('/roles', [App\Http\Controllers\Admin\UserController::class, 'roles']);
	Route::get('/create-roles', [App\Http\Controllers\Admin\UserController::class, 'createroles']);
	Route::POST('save-roles', [App\Http\Controllers\Admin\UserController::class, 'saveroles']);
	Route::get('edit-roles/{id}', [App\Http\Controllers\Admin\UserController::class, 'editroles']);
	Route::POST('update-roles', [App\Http\Controllers\Admin\UserController::class, 'updateroles']);
	Route::get('delete-roles/{id}', [App\Http\Controllers\Admin\UserController::class, 'deleteroles']);


	Route::get('/attributes', [App\Http\Controllers\Admin\ProductController::class, 'attributes']);
	Route::POST('/save-attributes', [App\Http\Controllers\Admin\ProductController::class, 'saveattributes']);
	Route::POST('/update-attributes', [App\Http\Controllers\Admin\ProductController::class, 'updateattributes']);
	Route::get('/edit-attributes/{id}', [App\Http\Controllers\Admin\ProductController::class, 'editattributes']);
	Route::get('/delete-attributes/{id}/{status}', [App\Http\Controllers\Admin\ProductController::class, 'deleteattributes']);

	Route::get('/attribute-fields/{id}', [App\Http\Controllers\Admin\ProductController::class, 'attributefields']);
	Route::POST('/save-attribute-fields', [App\Http\Controllers\Admin\ProductController::class, 'saveattributefields']);
	Route::POST('/update-attribute-fields', [App\Http\Controllers\Admin\ProductController::class, 'updateattributefields']);
	Route::get('/edit-attribute-fields/{id}', [App\Http\Controllers\Admin\ProductController::class, 'editattributefields']);
	Route::get('/delete-attribute-fields/{id}/{status}', [App\Http\Controllers\Admin\ProductController::class, 'deleteattributefields']);

	Route::get('/brand', [App\Http\Controllers\Admin\ProductController::class, 'brand']);
	Route::POST('/save-brand', [App\Http\Controllers\Admin\ProductController::class, 'savebrand']);
	Route::POST('/update-brand', [App\Http\Controllers\Admin\ProductController::class, 'updatebrand']);
	Route::get('/edit-brand/{id}', [App\Http\Controllers\Admin\ProductController::class, 'editbrand']);
	Route::get('/delete-brand/{id}/{status}', [App\Http\Controllers\Admin\ProductController::class, 'deletebrand']);


	Route::get('/return-reason', [App\Http\Controllers\Admin\ProductController::class, 'returnreason']);
	Route::POST('/save-return-reason', [App\Http\Controllers\Admin\ProductController::class, 'savereturnreason']);
	Route::POST('/update-return-reason', [App\Http\Controllers\Admin\ProductController::class, 'updatereturnreason']);
	Route::get('/edit-return-reason/{id}', [App\Http\Controllers\Admin\ProductController::class, 'editreturnreason']);
	Route::get('/delete-return-reason/{id}', [App\Http\Controllers\Admin\ProductController::class, 'deletereturnreason']);





	Route::get('backup', [App\Http\Controllers\Admin\BackupController::class, 'index']);
	Route::get('backup/create', [App\Http\Controllers\Admin\BackupController::class, 'create']);
	Route::get('backup/download/{file_name}', [App\Http\Controllers\Admin\BackupController::class, 'download']);
	Route::get('backup/delete/{file_name}', [App\Http\Controllers\Admin\BackupController::class, 'delete']);


	Route::get('/change-password', [App\Http\Controllers\Admin\HomeController::class, 'changepassword']);
	Route::POST('/update-password', [App\Http\Controllers\Admin\HomeController::class, 'updatepassword']);

	Route::get('/settings', [App\Http\Controllers\Admin\SettingsController::class, 'settings']);
    Route::POST('/update-settings', [App\Http\Controllers\Admin\SettingsController::class, 'updatesettings']);

	Route::get('/payments-out-report', [App\Http\Controllers\Admin\ReportController::class, 'paymentsoutreport']);
	Route::POST('/get-payments-out-report', [App\Http\Controllers\Admin\ReportController::class, 'getpaymentsoutreport']);

	Route::get('/change-status-paymentsout/{id}/{status}', [App\Http\Controllers\Admin\ReportController::class, 'changestatuspaymentsout']);

	Route::get('/languages', [App\Http\Controllers\Admin\SettingsController::class, 'languageTable']);
    Route::get('/fetch_language', [App\Http\Controllers\Admin\SettingsController::class, 'fetchLanguage']);
    Route::POST('/insert_language', [App\Http\Controllers\Admin\SettingsController::class, 'insertLanguage']);
    Route::POST('/update_language', [App\Http\Controllers\Admin\SettingsController::class, 'updateLanguage']);
    Route::POST('/delete_language', [App\Http\Controllers\Admin\SettingsController::class, 'deleteLanguage']);

    Route::get('/change-language/{language}', [App\Http\Controllers\Admin\SettingsController::class, 'changelanguage']);


	//product
	Route::get('/product', [App\Http\Controllers\Admin\ProductController::class, 'product']);
	Route::POST('/update-product', [App\Http\Controllers\Admin\ProductController::class, 'updateproduct']);
	Route::get('/edit-product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'editproduct']);
	Route::get('/delete-product/{id}/{status}', [App\Http\Controllers\Admin\ProductController::class, 'deleteproduct']);
	Route::get('/delete-product-image/{id}', [App\Http\Controllers\Admin\ProductController::class, 'deleteproductimage']);
	Route::get('/delete-product-attribute/{id}', [App\Http\Controllers\Admin\ProductController::class, 'deleteproductattribute']);
	

	Route::get('/project', [App\Http\Controllers\Admin\ProjectController::class, 'project']);
	Route::POST('/update-project', [App\Http\Controllers\Admin\ProjectController::class, 'updateproject']);
	Route::get('/edit-project/{id}', [App\Http\Controllers\Admin\ProjectController::class, 'editproject']);
	Route::get('/delete-project/{id}/{status}', [App\Http\Controllers\Admin\ProjectController::class, 'deleteproject']);
	Route::get('/delete-project-image/{id}', [App\Http\Controllers\Admin\ProjectController::class, 'deleteprojectimage']);


	Route::get('/idea-book', [App\Http\Controllers\Admin\IdeaBookController::class, 'ideabook']);
	Route::POST('/update-idea-book', [App\Http\Controllers\Admin\IdeaBookController::class, 'updateideabook']);
	Route::get('/edit-idea-book/{id}', [App\Http\Controllers\Admin\IdeaBookController::class, 'editideabook']);
	Route::get('/delete-idea-book/{id}/{status}', [App\Http\Controllers\Admin\IdeaBookController::class, 'deleteideabook']);
	Route::get('/delete-idea-book-image/{id}', [App\Http\Controllers\Admin\IdeaBookController::class, 'deleteideabookimage']);
	

});

Route::group(['prefix' => 'vendor'],function(){

	Route::get('/login', [App\Http\Controllers\VendorLogin\LoginController::class, 'showLoginForm'])->name('vendor.login');
	Route::post('/login', [App\Http\Controllers\VendorLogin\LoginController::class, 'login'])->name('vendor.login.submit');
	Route::post('/logout', [App\Http\Controllers\HomeController::class, 'vendorlogout'])->name('vendor.logout');

	Route::post('/password/email', [App\Http\Controllers\VendorLogin\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('vendor.password.email');
	Route::get('/password/reset', [App\Http\Controllers\VendorLogin\ForgotPasswordController::class, 'showLinkRequestForm'])->name('vendor.password.request');
	Route::post('/password/reset', [App\Http\Controllers\VendorLogin\ResetPasswordController::class, 'reset']);
	Route::get('/password/reset/{token}', [App\Http\Controllers\VendorLogin\ResetPasswordController::class, 'showResetForm'])->name('vendor.password.reset');

	Route::get('/dashboard', [App\Http\Controllers\Vendor\HomeController::class, 'dashboard'])->name('vendor.dashboard');

	Route::get('/enquiry', [App\Http\Controllers\Vendor\HomeController::class, 'enquiry']);

	Route::get('/orders', [App\Http\Controllers\Vendor\OrderController::class, 'orders']);
    Route::POST('/get-orders', [App\Http\Controllers\Vendor\OrderController::class, 'getorders']);
    Route::get('/change-order-status/{id}/{status}', [App\Http\Controllers\Vendor\OrderController::class, 'changeorderstatus']);
	Route::get('/view-order/{id}', [App\Http\Controllers\Vendor\OrderController::class, 'vieworder']);


	Route::get('/return-item', [App\Http\Controllers\Vendor\OrderController::class, 'returnitem']);
    Route::POST('/get-return-item', [App\Http\Controllers\Vendor\OrderController::class, 'getreturnitem']);
    Route::get('/change-return-item-status/{id}/{status}', [App\Http\Controllers\Vendor\OrderController::class, 'changereturnitemtatus']);



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


	Route::get('/coupon', [App\Http\Controllers\Vendor\CouponController::class, 'coupon']);
	Route::POST('/save-coupon', [App\Http\Controllers\Vendor\CouponController::class, 'savecoupon']);
	Route::POST('/update-coupon', [App\Http\Controllers\Vendor\CouponController::class, 'updatecoupon']);
	Route::get('/edit-coupon/{id}', [App\Http\Controllers\Vendor\CouponController::class, 'editcoupon']);
	Route::get('/delete-coupon/{id}', [App\Http\Controllers\Vendor\CouponController::class, 'deletecoupon']);


	Route::get('/product-reviews', [App\Http\Controllers\Vendor\ReviewsController::class, 'productreviews']);
	// Route::get('/reviews-status/{id}/{status}', [App\Http\Controllers\Vendor\ReviewsController::class, 'reviewsstatus']);


	Route::get('/add-project', [App\Http\Controllers\Vendor\SettingsController::class, 'addproject']);
	Route::get('/project', [App\Http\Controllers\Vendor\SettingsController::class, 'project']);
	Route::POST('/save-project', [App\Http\Controllers\Vendor\SettingsController::class, 'saveproject']);
	Route::POST('/update-project', [App\Http\Controllers\Vendor\SettingsController::class, 'updateproject']);
	Route::get('/edit-project/{id}', [App\Http\Controllers\Vendor\SettingsController::class, 'editproject']);
	Route::get('/delete-project/{id}', [App\Http\Controllers\Vendor\SettingsController::class, 'deleteproject']);
	Route::get('/delete-project-image/{id}', [App\Http\Controllers\Vendor\SettingsController::class, 'deleteprojectimage']);


	Route::get('/add-idea-book', [App\Http\Controllers\Vendor\IdeaBookController::class, 'addideabook']);
	Route::get('/idea-book', [App\Http\Controllers\Vendor\IdeaBookController::class, 'ideabook']);
	Route::POST('/save-idea-book', [App\Http\Controllers\Vendor\IdeaBookController::class, 'saveideabook']);
	Route::POST('/update-idea-book', [App\Http\Controllers\Vendor\IdeaBookController::class, 'updateideabook']);
	Route::get('/edit-idea-book/{id}', [App\Http\Controllers\Vendor\IdeaBookController::class, 'editideabook']);
	Route::get('/delete-idea-book/{id}', [App\Http\Controllers\Vendor\IdeaBookController::class, 'deleteideabook']);
	Route::get('/delete-idea-book-image/{id}', [App\Http\Controllers\Vendor\IdeaBookController::class, 'deleteideabookimage']);


	Route::get('/payments-in-report', [App\Http\Controllers\Vendor\ReportController::class, 'paymentsinreport']);
	Route::POST('/get-payments-in-report', [App\Http\Controllers\Vendor\ReportController::class, 'getpaymentsinreport']);



	// Route::get('/idea-book', [App\Http\Controllers\Vendor\SettingsController::class, 'ideabook']);
	// Route::POST('/save-idea-book', [App\Http\Controllers\Vendor\SettingsController::class, 'saveideabook']);
	// Route::POST('/update-idea-book', [App\Http\Controllers\Vendor\SettingsController::class, 'updateideabook']);
	// Route::get('/edit-idea-book/{id}', [App\Http\Controllers\Vendor\SettingsController::class, 'editideabook']);
	// Route::get('/delete-idea-book/{id}', [App\Http\Controllers\Vendor\SettingsController::class, 'deleteideabook']);

	// Route::get('/idea-book-images/{id}', [App\Http\Controllers\Vendor\SettingsController::class, 'ideabookimages']);
	// Route::POST('/save-idea-book-images', [App\Http\Controllers\Vendor\SettingsController::class, 'saveideabookimages']);
	// Route::get('/delete-idea-book-images/{id}', [App\Http\Controllers\Vendor\SettingsController::class, 'deleteideabookimages']);


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
	//chat
	Route::get('/chat/{id}', [App\Http\Controllers\Vendor\ChatController::class, 'getChat']);

	Route::get('/change-password', [App\Http\Controllers\Vendor\HomeController::class, 'changepassword']);
	Route::POST('/update-password', [App\Http\Controllers\Vendor\HomeController::class, 'updatepassword']);

	Route::get('/chat-to-customer/{id}', [App\Http\Controllers\Vendor\ChatController::class, 'chatToCustomer']);
	Route::get('/get-customer-chat/{id}', [App\Http\Controllers\Vendor\ChatController::class, 'getCustomerChat']);
	Route::POST('/save-customer-chat', [App\Http\Controllers\Vendor\ChatController::class, 'saveCustomerChat']);

	Route::get('/get-admin-chat/{id}', [App\Http\Controllers\Vendor\ChatController::class, 'getAdminChat']);
	Route::POST('/save-admin-chat', [App\Http\Controllers\Vendor\ChatController::class, 'saveAdminChat']);


});

Route::group(['prefix' => 'professional'],function(){

	Route::get('/login', [App\Http\Controllers\PageController::class, 'professionallogin']);

	// Route::get('/login', [App\Http\Controllers\ProfessionalLogin\LoginController::class, 'showLoginForm'])->name('professional.login');
	// Route::post('/login', [App\Http\Controllers\ProfessionalLogin\LoginController::class, 'login'])->name('professional.login.submit');
	// Route::post('/logout', [App\Http\Controllers\ProfessionalLogin\LoginController::class, 'logout'])->name('professional.logout');

	// Route::post('/password/email', [App\Http\Controllers\ProfessionalLogin\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('professional.password.email');
	// Route::get('/password/reset', [App\Http\Controllers\ProfessionalLogin\ForgotPasswordController::class, 'showLinkRequestForm'])->name('professional.password.request');
	// Route::post('/password/reset', [App\Http\Controllers\ProfessionalLogin\ResetPasswordController::class, 'reset']);
	// Route::get('/password/reset/{token}', [App\Http\Controllers\ProfessionalLogin\ResetPasswordController::class, 'showResetForm'])->name('professional.password.reset');

	// Route::get('/dashboard', [App\Http\Controllers\professional\HomeController::class, 'dashboard'])->name('professional.dashboard');
});


Route::group(['prefix' => 'customer'],function(){
	Route::post('/logout', [App\Http\Controllers\HomeController::class, 'customerlogout'])->name('customer.logout');

	Route::get('/profile', [App\Http\Controllers\Customer\HomeController::class, 'profile']);
	Route::get('/change-password', [App\Http\Controllers\Customer\HomeController::class, 'changepassword']);
    Route::get('/return-item', [App\Http\Controllers\Customer\HomeController::class, 'returnitem']);

	Route::get('/orders', [App\Http\Controllers\Customer\HomeController::class, 'orders']);

	Route::get('/view-orders/{id}', [App\Http\Controllers\Customer\HomeController::class, 'vieworders']);
	Route::post('save-return-item', [App\Http\Controllers\Customer\HomeController::class, 'savereturnitem']);
	Route::get('order-cancel/{id}', [App\Http\Controllers\Customer\HomeController::class, 'ordercancel']);


	Route::get('/enquiry', [App\Http\Controllers\Customer\HomeController::class, 'enquiry']);

	
	Route::get('/track-order/{id}', [App\Http\Controllers\Customer\OrderController::class, 'trackorder']);
	
	
	Route::get('/manage-address', [App\Http\Controllers\Customer\ProfileController::class, 'manageaddress']);
    Route::post('/save-address', [App\Http\Controllers\Customer\ProfileController::class, 'saveaddress']);
	Route::post('/update-address', [App\Http\Controllers\Customer\ProfileController::class, 'updateaddress']);
	Route::get('/edit-address/{id}', [App\Http\Controllers\Customer\ProfileController::class, 'editaddress']);
	
	
	Route::get('/favourites', [App\Http\Controllers\Customer\FavouriteController::class, 'favourites']);
	Route::get('/save-favourites/{id}', [App\Http\Controllers\Customer\FavouriteController::class, 'savefavourites']);
    Route::get('/delete-favourites/{id}', [App\Http\Controllers\Customer\FavouriteController::class, 'deletefavourites']);

	
	Route::get('/save-favourites-idea/{id}', [App\Http\Controllers\Customer\FavouriteController::class, 'savefavouritesidea']);
    Route::get('/delete-favourites-idea/{id}', [App\Http\Controllers\Customer\FavouriteController::class, 'deletefavouritesidea']);

	
    Route::POST('/update-password', [App\Http\Controllers\Customer\HomeController::class, 'updatepassword']);
	Route::POST('/update-profile', [App\Http\Controllers\Customer\HomeController::class, 'updateprofile']);
	
	// Chat
	Route::get('/chat', [App\Http\Controllers\Customer\ChatController::class, 'chat']);

});