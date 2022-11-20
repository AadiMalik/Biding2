<?php

use Illuminate\Support\Facades\Route;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('sobre-nosotros','about_us');
// Route::view('subasta-cerrada','action_close');
Route::view('se','main');
// Route::view('como-funciona','how_work');
// Route::view('mi-subastek','my_actions');
// Route::view('opiniones','opinions');
Route::view('política-de-privacidad','privacy');
Route::view('terminos-y-condiciones','term_condition');


// profile
Route::group(['middleware' => ['auth']], function () {
    Route::get('profile', 'ProfileController@index');
    Route::post('update-profile', 'ProfileController@update');
});

// User
Route::group(['as' => 'client.', 'middleware' => ['auth']], function () {
    Route::get('home', 'HomeController@redirect');

    Route::get('dashboard', 'HomeController@index')->name('home');
    Route::get('bid-use', 'BidUseController@index')->name('bid-use');
    Route::get('win-product', 'WinProductController@index')->name('win-product');
    Route::get('buy-product/{id}', 'WinProductController@pay_product');
    Route::post('product-payment', 'WinProductController@payment');
    Route::get('wish-list', 'WishController@index');

    
});

Route::get('/', 'HomeController@home')->name('/');
Route::post('bid-product', 'HomeController@bidByUser')->middleware('auth');
Route::post('win-product', 'HomeController@winByUser')->middleware('auth');
Route::post('wish-store', 'HomeController@WishByUser')->middleware('auth');
Route::get('orders', 'OrderController@index')->middleware('auth');
Route::get('checkout/{id}', 'HomeController@checkout')->middleware('auth');
Route::post('checkout-store', 'OrderController@store')->middleware('auth');
Route::post('auto-bid', 'HomeController@AutoBid');
Route::get('product', 'HomeController@product')->name('product.index');
Route::get('subasta/{id}','HomeController@product_detail');
Route::get('product_detail_bid/{id}','HomeController@product_detail_bid');
Route::get('opiniones', 'HomeController@opinion');
Route::get('comprar-bids', 'HomeController@bid_buy')->name('comprar-bids');
Route::get('como-funciona', 'HomeController@how_work');
Route::get('faq', 'HomeController@faq');
Route::get('subasta-cerrada', 'HomeController@Action_Close');
Route::get('opinion', 'HomeController@opinion_auto')->name('opinion.index');
Route::get('most-opinion', 'HomeController@most_opinion_auto')->name('most_opinion.index');
Route::post('opinion_like', 'HomeController@likes')->name('opinion.like')->middleware('auth');
Route::post('payment_method', 'PaymentMethodController@store')->name('payment_method.store')->middleware('auth');
Route::post('payment', 'PackageBuyController@store')->name('payment.store')->middleware('auth');


Auth::routes();



// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth.admin']], function () {

    Route::get('/admin', 'HomeController@index')->name('home');
    Route::get('paid-users/{id?}', 'HomeController@paidUsers');
    


   
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Categories
    Route::resource('category', 'CategoryController');
    // Product
    Route::resource('product', 'ProductController');
    // Opinion
    Route::resource('opinion', 'OpinionController');
    // Package
    Route::resource('package', 'PackageController');
    // Package Buy
    Route::resource('package-buy', 'PackageBuyController');
    // Slider
    Route::resource('slider', 'SliderController');
    // FAQ Category
    Route::resource('faq-category', 'FaqCategoryController');
    // FAQ
    Route::resource('faq', 'FaqController');
    // Social Media
    Route::resource('media', 'SocialMediaController');
    // Content
    Route::resource('content', 'ContentController');
    // Order
    Route::resource('orders', 'OrderController');
    Route::post('change_status', 'OrderController@Status_Change');
    
});


Route::group(['middleware' => ['auth']], function () {

    Route::get('stripe', 'StripeController@stripe');
    Route::post('stripe', 'StripeController@stripePost')->name('stripe.post');
});

