<?php
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
//Auth::routes();


Route::get('/index', 'SiteController@index')->name('index');
Route::get('/', 'SiteController@index')->name('index');

Route::get('/home', 'SiteController@index')->name('home');

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::get('/login', 'SessionController@create')->name('login');
Route::post('/login', 'SessionController@store')->name('login');

Route::get('/forgotpassword', 'ForgotPasswordController@showPasswordResetForm')->name('password.email');
Route::post('/forgotpassword', 'ForgotPasswordController@sendResetPassword')->name('password.email');
Route::get('/newpassword', 'ForgotPasswordController@newpassword')->name('password.reset');
Route::post('/newpassword', 'ForgotPasswordController@resetpassword')->name('password.reset');


Route::get('/redirect/{driver}', 'SocialAuthController@redirectToProvider');
Route::get('/callback/{driver}', 'SocialAuthController@handleProviderCallback');


Route::get('/logout', 'SessionController@destroy')->name('logout');
Route::post('/logout', 'SessionController@destroy')->name('logout');

Route::get('/register', 'RegisterController@create')->name('register');
Route::post('/register', 'RegisterController@store')->name('register');

Route::get('/verify/{user}', 'RegisterController@verify')->name('verify');

Route::get('/findlawyer', 'SearchController@findalawyer')->name('findalawyer');

Route::get('/searchlawyer', 'SearchController@searchlawyer')->name('searchlawyer');

Route::get('/profile/{user}/service/{service}', 'ProfileController@index')->name('profile');
Route::post('/profile/update', 'HomeController@update')->name('profile_update');
Route::post('/profile/passwd/update', 'HomeController@passwordUpdate')->name('password_update');

Route::get('/checkout/{service}', 'CheckoutController@index')->name('service_checkout');

Route::get('/legaldocuments', 'SearchController@legaldocuments')->name('legaldocuments');
Route::get('/configdocuments/{document}', 'DocumentController@configdocuments')->name('configdocuments');

Route::get('/documents', 'DocumentController@index')->name('documents');
Route::post('/configdocuments/{document}', 'DocumentController@configdata')->name('configdata');
Route::get('/configdocuments2/{document}/order/{order}', 'DocumentController@configdata2')->name('configdata_show');
Route::get('/configdocuments2/{document}', 'DocumentController@configdata2')->name('configdata2');

Route::post('/document/profile/{orderDocument}', 'DocumentController@profile')->name('document_profile');

Route::post('/checkout/document/{document}', 'CheckoutController@documentCheckout')->name('document_checkout');
Route::get('/checkout/document/{document}', 'CheckoutController@documentCheckout')->name('document_checkout');




// Test Driven Routes Development
Route::get('/categories', 'CategoriesController@index')->name('categories');
Route::get('/categories/{category}', 'CategoriesController@show')->name('showCategory');
Route::get('/categories/create', 'CategoriesController@create')->name('createCategory');

Route::post('/reviews/create', 'ReviewsController@store')->name('createReview');

//flip
Route::get('/flip/create', 'FlipController@create')->name('flip.create'); 
Route::post('/flip/create', 'FlipController@store')->name('flip.store'); 
Route::get('/flip/{document}', 'FlipController@index')->name('flip');

// search
Route::get('/search', 'SearchController@index')->name('search');
Route::get('/test', 'SearchController@test')->name('test');
Route::get('/tags/{tag}', 'TagsController@show')->name('tags');

Route::post('/documents/addtocart/{document}', 'OrderController@addDocumentsToCart')->name('add_doc_to_cart');



Route::get('/documents/{document}', 'DocumentController@show')->name('showDocument');
Route::get('/documents/create', 'DocumentController@create')->name('createDocument');
Route::get('/documents/download/{document}', 'DocumentController@download')->name('downloadDocument');

Route::get('/services/checkout', 'OrderController@checkout')->name('checkout');

Route::get('/services/checkout/empty', 'OrderController@emptycheckout')->name('clearcart');

Route::post('/services/addtocart/{service}', 'OrderController@addtocart')->name('addtocart');

Route::get('/services/remove/{service}', 'OrderController@removeFromCart')->name('removefromcart');

Route::get('/cart/viewcart', 'OrderController@viewCart')->name('viewcart');

Route::get('/services', 'ServicesController@index')->name('services');

Route::get('/services/{service}', 'ServicesController@show')->name('showService');
Route::get('/services/create', 'ServicesController@create')->name('createService');

Route::get('/resources', 'ResourcesController@index')->name('resource_list');



// Customers/Users

// Route::get('/register', 'CustomerController@create')->name('register');
// Route::post('/register', 'CustomerController@store')->name('register');
Route::post('/update/{user}', 'CustomerController@update')->name('update');
Route::get('/showPicture/{user}', 'CustomerController@showPicture')->name('showPicture');
Route::post('/updatePicture/{user}', 'CustomerController@updatePicture')->name('updatePicture');
Route::get('/thankyou/{user}', 'CustomerController@thankyou')->name('thankyou');


Route::post('/deactivate/{user}', 'CustomerController@deactivate')->name('deactivate');
Route::get('/deativated/{user}', 'CustomerController@deactivated')->name('customer.deactivated');
Route::get('/reativate/{user}', 'CustomerController@reactivate')->name('customer.reactivate');

Route::get('/show/{user}', 'CustomerController@show')->name('customer.show');
Route::get('/show/{user}/order/{order}', 'CustomerController@showOrder')->name('customer.show.order');
Route::get('/show/{user}/orders', 'CustomerController@showOrders')->name('customer.show.orders');

Route::get('/show/{user}/order/{order}/cancel', 'CustomerController@showCancelOrder')->name('customer.cancel.order');
Route::post('/show/{user}/order/{order}/cancel', 'CustomerController@cancelOrder')->name('cancel.order');

// MERCHANT REGISTRATION

Route::get('/merchant/register', 'MerchantController@create')->name('merchant_register');
Route::post('/merchant/register', 'MerchantController@store')->name('merchant_register');
Route::get('/merchant/thankyou/{user}', 'MerchantController@thankyou')->name('merchant_thankyou');
Route::get('/merchant/update/{merchant}', 'MerchantController@show')->name('merchant_update');
Route::post('/merchant/update/{merchant}', 'MerchantController@update')->name('merchant_update');

// not done 
Route::get('/merchant/index/{user}', 'MerchantController@index')->name('merchant_index');
Route::get('/merchant/{user}/orders', 'MerchantController@orders')->name('merchant_orders');
Route::get('/merchant/{user}/ordersview/{order}', 'MerchantController@ordersView')->name('merchant_orders_view');
Route::get('/merchant/{user}/ordersfulfill/{order}', 'MerchantController@createOrdersFulfill')->name('merchant_fulfill_order');
Route::post('/merchant/{user}/ordersfulfill/{order}', 'MerchantController@storeOrdersFulfill')->name('merchant_fulfill_order');
Route::get('/merchant/{user}/services', 'MerchantController@services')->name('merchant_services');

Route::get('/merchant/{user}/services/create', 'MerchantController@createService')->name('merchant_new_service');
Route::post('/merchant/{user}/services/create', 'MerchantController@storeService')->name('merchant_new_service');
Route::get('/merchant/{user}/servicesView/{service}', 'MerchantController@servicesView')->name('merchant_service_view');

Route::get('/merchant/{user}/issues', 'MerchantController@issues')->name('merchant_issues');
Route::post('/merchant/{user}/issues/{order}', 'MerchantController@issuesOrderCancel')->name('merchant_order_cancel');




// paystack
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::post('/order/{service}', 'OrderController@show')->name('order');
Route::get('/order/{service}', 'OrderController@show')->name('order');

Route::post('/order/document/{document}', 'OrderController@showDocument')->name('order.document');
Route::get('/order/document/{document}', 'OrderController@showDocument')->name('order.document');



//http ://localhost:8000/newpassword?newpassword?uid=1260309&code=EaB2&responseMode=1

// Password reset link request routes...
//Route::post('password/email', 'Auth\PasswordController@postResetEmail');

//Admin Module
Route::get('/admin','Admin\AdminController@index')->name('admin');
Route::post('/admin','Admin\AdminController@show');
Route::get('/admin-logout','Admin\AdminController@destroy')->name('admin-logout');
Route::post('/admin-forgot','ForgotPasswordController@sendResetPassword');


//dashboard
Route::get('/admin-dashboard','Admin\DashboardController@index')->name('admin-dashboard');


//account settings
Route::get('/account-settings/{id}','Admin\UserController@show');
Route::post('/account-settings','Admin\UserController@update');

//category management
Route::get('/categories','Admin\CategoryController@index')->name('category');
Route::get('/addcategory','Admin\CategoryController@create')->name('addcategory');
Route::post('/addcategory','Admin\CategoryController@store');
Route::get('/editcategory/{id}','Admin\CategoryController@edit');
Route::post('/categoryupdate','Admin\CategoryController@update');
Route::get('/category-delete','Admin\CategoryController@destroy');
Route::get('/search-category','Admin\CategoryController@search');

//Admin User management
Route::get('/users','Admin\UserController@index')->name('users');
Route::get('/edituser/{id}','Admin\UserController@show');
Route::get('/deactivateuser','Admin\UserController@destroy');

//Service management
Route::get('/services','Admin\ServiceController@index');
Route::get('/addservice','Admin\ServiceController@create')->name('addservice');
Route::post('/addservice','Admin\ServiceController@store');
Route::get('/deleteservice','Admin\ServiceController@destroy');
Route::get('/editservice/{id}','Admin\ServiceController@show');
Route::post('/editservice','Admin\ServiceController@update');
Route::get('/searchservice','Admin\ServiceController@searchService');
//Service Orders mgt.
Route::get('/serviceorders','Admin\ServiceOrderController@index');


//Document Management
Route::get('/admindocuments','Admin\DocumentController@index')->name('admindocuments');
Route::get('/adddocument','Admin\DocumentController@create');
Route::post('/adddocument','Admin\DocumentController@store');

//Ads Mangement
Route::get('/ads','Admin\AdController@index')->name('ads');
Route::get('/addad','Admin\AdController@create')->name('addad');
Route::post('/addad','Admin\AdController@store');
Route::get('/deletead','Admin\AdController@destroy');
Route::get('/editad/{id}','Admin\AdController@edit');

//Test Page
Route::get('/test',function(){
    return NOW();
});






