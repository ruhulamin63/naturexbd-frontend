<?php

use App\Http\Controllers\ProductController;
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

////////////////////
// Custom routes //
//////////////////

// Route::get('/', function () {
//     return view('grocery.signin.signin');
// });

// Route::get('/','HomeController@homePageSelect');

Route::group(['middleware'=>['checkGuest']],function(){


Route::get('/','HomeController@groceryIndex');

Route::get('/grocery','HomeController@groceryIndex');

Route::get('/test', function () {
    return view('grocery.home.main_panel');
});

Route::get('/seeAllProduct','ProductController@seeAllProduct');

Route::get('/specialOffer/{id}','SpecialOfferController@grocery_special_offer');

//promoCode Details
Route::get('/grocery_promo_details/{id}','PromoController@grocery_promo_details');

//offer
Route::get('/offer_Product','OfferController@offer_details');

Route::get('/grocery_product_details/{id}','ProductController@grocery_product_details');

Route::get('/grocery_product_category/{category}','ProductController@grocery_product_category');

//start writing by Ruhul
Route::get('/grocery_blog',[ProductController::class, 'grocery_blog_post']);
//end writing by Ruh

Route::post('/applyPromo','PromoController@applyPromo');

Route::get('/removePromo','PromoController@removePromo');

Route::get('/signout','SigninController@logout');

//Signin routes
Route::get('/signin','SigninController@signinInit');
// Route::get('/signin', function () {
//     return view('grocery.signin.signin');
// });
Route::post('/signin','SigninController@signin');

Route::post('/quick-sign','SigninController@quickSign');

//forgot pass
Route::get('/forgot-pass', function () {
    return view('grocery.forgot.forgot');
});

Route::post('/forgot-pass','SigninController@forgotPassword');
Route::get('reset-pass','SigninController@resetPassword');


//Signup routes
Route::get('/signup', function () {
    return view('grocery.signup.signup');
});
Route::post('/signup','SignupController@signup');



//AJAX routes
Route::post('/grocery/product/add_to_cart','ProductController@grocery_add_to_cart');
Route::post('/grocery/product/add_to_cart_details','ProductController@add_to_cart_details');
Route::post('/grocery/product/add_to_cart_plus','ProductController@grocery_add_to_cart_plus');
Route::post('/grocery/product/add_to_cart_minus','ProductController@grocery_add_to_cart_minus');
Route::post('/grocery/product/remove_cart','ProductController@grocery_remove_cart');
Route::get('/addToCartAndCheckout/{id}','ProductController@addToCartAndCheckout');
Route::post('/search_keyword','SearchController@search_keyword');

//bKash routes
Route::post('/token','PaymentController@token');
//Route::post('/validate-payment','PaymentController@validatePayment');
Route::get('/createpayment','PaymentController@createpayment');
Route::get('/executepayment','PaymentController@executepayment');

//bKash routes Restaurant
Route::post('/resToken','Restaurant\PaymentController@token');
Route::get('/resCreatepayment','Restaurant\PaymentController@createpayment');
Route::get('/resExecutepayment','Restaurant\PaymentController@executepayment');

////////////////////////
// Middleware routes //
//////////////////////
Route::get('/checkout','CheckoutController@checkout');
Route::post('/place_order','OrderController@place_order');
Route::group(['middleware'=>['customAuth']],function(){
    Route::get('/MyOrder','OrderController@MyOrderNew');
    Route::get('/res_MyOrder','Restaurant\OrderController@MyAllOrder');

    Route::get('/my_orderOld', function () {
        return view('grocery.my_order');
    });
    Route::get('/cart','ProductController@mobileCartDetails');

    // Route::get('/checkout','CheckoutController@checkout');
    Route::get('/resCheckout','Restaurant\CheckoutController@checkout');

    Route::get('/profile','ProfileController@profile');
    Route::post('/update_profile','ProfileController@update_profile');
    Route::post('/change_profile_pic','ProfileController@change_profile_pic');
    Route::post('/change_address','ProfileController@change_address');

    // Route::post('/place_order','OrderController@place_order');
    Route::post('/resplace_order','Restaurant\OrderController@place_order');

    Route::post('/changeDeliveryZon','CheckoutController@ChangeDeliveryZon');
});


////////////////////////
// Restaurant routes //
//////////////////////

// Route::get('/restaurant','Restaurant\HomeController@index');
Route::get('/seeAllFood','Restaurant\ProductController@seeAllFood');

Route::get('/restaurant_product_details/{id}','Restaurant\ProductController@restaurant_product_details');

Route::get('/restaurant_details/{id}','Restaurant\RestaurantController@restaurant_details');

Route::get('/restaurant_product_category/{category}','Restaurant\ProductController@restaurant_product_category');

//Restaurant Cart
Route::post('/restaurant/product/add_to_cart','Restaurant\ProductController@restaurant_add_to_cart');
Route::post('/restaurant/product/add_to_cart_details','Restaurant\ProductController@add_to_cart_details');
Route::post('/restaurant/product/add_to_cart_plus','Restaurant\ProductController@restaurant_add_to_cart_plus');
Route::post('/restaurant/product/add_to_cart_minus','Restaurant\ProductController@restaurant_add_to_cart_minus');
Route::post('/restaurant/product/remove_cart','Restaurant\ProductController@restaurant_remove_cart');

Route::get('/addToCartAndCheckout/{id}','ProductController@addToCartAndCheckout');
Route::get('/resAddToCartAndCheckout/{id}','Restaurant\ProductController@addToCartAndCheckout');

//Restaurant AJAX
Route::post('/resSearch_keyword','Restaurant\SearchController@search_keyword');

//Res promoCode Details
Route::get('/restaurant_promo_details/{id}','Restaurant\PromoController@grocery_promo_details');

Route::post('/resApplyPromo','PromoController@resApplyPromo');

Route::get('/resRemovePromo','PromoController@resRemovePromo');

//////////////////////
// Template routes //
////////////////////

Route::get('/login', function () {
    return view('grocery.signin.signin');
});

Route::get('/promos', function () {
    return view('grocery.promos');
});

Route::get('/change_password', function () {
    return view('grocery.change_password');
});

Route::get('/my_address', function () {
    return view('grocery.my_address');
});

Route::get('/picks_today', function () {
    return view('grocery.picks_today');
});

Route::get('/privacy', function () {
    return view('grocery.privacy');
});

Route::get('/product_details', function () {
    return view('grocery.product_details');
});

Route::get('/deactivate_account', function () {
    return view('grocery.deactivate_account');
});

Route::get('/faq', function () {
    return view('grocery.faq');
});

Route::get('/fresh_vegan', function () {
    return view('grocery.fresh_vegan');
});

Route::get('/help_support', function () {
    return view('grocery.help_support');
});

Route::get('/help_ticket', function () {
    return view('grocery.help_ticket');
});

Route::get('/listing', function () {
    return view('grocery.listing');
});

Route::get('/promo_details', function () {
    return view('grocery.promo_details');
});

Route::get('/recommend', function () {
    return view('grocery.recommend');
});

Route::get('/refund_payment', function () {
    return view('grocery.refund_payment');
});

Route::get('/review', function () {
    return view('grocery.review');
});

Route::get('/search', function () {
    return view('grocery.search');
});

Route::get('/status_canceled', function () {
    return view('grocery.status_canceled');
});

Route::get('/status_complete', function () {
    return view('grocery.status_complete');
});

Route::get('/status_onprocess', function () {
    return view('grocery.status_onprocess');
});

Route::get('/successful', function () {
    return view('grocery.successful');
});

Route::get('/terms_conditions', function () {
    return view('grocery.terms_conditions');
});

Route::get('/terms&conditions', function () {
    return view('grocery.terms&conditions');
});

Route::get('/verification', function () {
    return view('grocery.verification');
});

//hello world
Route::get('/nagad/pay/{pay}/{type}','Restaurant\NagadPaymentController@pay')->name('nagad.pay');
Route::get('/nagad-payment','Restaurant\NagadPaymentController@pay')->name('nagad.payment');
Route::get('/nagad/guest-pay/{pay}/{type}','Restaurant\NagadPaymentController@guestPay')->name('nagad.guest.pay');
Route::get('nagad/callback','Restaurant\NagadPaymentController@callback');


});





