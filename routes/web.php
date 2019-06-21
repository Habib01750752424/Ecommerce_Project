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
//Frontend site........................
Route::get('/', 'HomeController@index');

//Show category wise products here....
Route::get('/product_by_category/{category_id}','HomeController@show_product_by_category');

//Show Brand wise products here....
Route::get('/product_by_manufacture/{manufacture_id}','HomeController@show_product_by_manufacture');

//Show details in every product here....
Route::get('/view_product/{product_id}','HomeController@product_details_by_id');

//Cart routes are here..............
Route::post('/add-to-cart','CartController@add_to_cart');
Route::get('/show-cart','CartController@show_cart');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');
Route::post('/update-cart','CartController@update_cart');
Route::post('/also-update-cart','CartController@also_update_cart');

//Payment route are here..................
Route::get('/payment','CheckoutController@payment');
Route::post('/order-place','CheckoutController@order_place');

//Card routes are here..............
Route::get('/buy-your-card','CardController@BuyYourCard');
Route::post('/submit-balance','CardController@SubmitBalance');
Route::get('/buy-product','CardController@BuyYourProduct');

//Card routes are here..............
Route::post('/save-balance','CardController@SaveBalance');
Route::post('/save-number','CardController@SaveNumber');
Route::get('/buy_product','CardController@BuyProduct');
Route::get('/user_profile','CardController@UserProfile');

//Book buying routes are here..............
Route::get('/buy_book_details','CardController@BuyBookDetails');
Route::get('/buy_book','CardController@BuyBook');




//Checkout routes are here.................
Route::get('/login-check','CheckoutController@login_check');
Route::post('/customer_registration','CheckoutController@customer_registration');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/save-shipping-details','CheckoutController@save_shipping_details');

//Customer login and logout are here....................
Route::post('/customer_login','CheckoutController@customer_login');
Route::get('/customer_logout','CheckoutController@customer_logout');
Route::get('/manage-order','CheckoutController@manage_order');
Route::get('/view-order/{order_id}','CheckoutController@view_order');


//Review rating routes are here..................
Route::post('/insert-review/{product_id}','ReviewController@insert_review');
Route::get('/details','ReviewController@ReviewDetails');
Route::get('/login-user','ReviewController@LoginUser');
Route::post('/user-login','ReviewController@UserLogin');
Route::get('/signup','ReviewController@SignUp');
Route::post('/register','ReviewController@Register');
Route::get('/call-review-rating-page','ReviewController@CallReviewRatingPage');
//Route::get('/review-rating','ReviewController@CallReviewRatingPage');






//Backend site.........................
Route::get('/logout','SuperAdminController@logout');
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard','SuperAdminController@index');
Route::post('/admin-dashboard','AdminController@dashboard');

//SuperAdmin and Branch Route..............
 Route::get('/all-branch-admin','BranchAdminController@BranchAdmin');
 Route::get('/create-branch','BranchAdminController@CreateBranch');
 Route::post('/save-branch-admin','BranchAdminController@SaveBranchAdmin');
 Route::get('/branch','BranchAdminController@BranchAdmin');
 Route::get('/login-branch-admin/{id}','BranchAdminController@LoginBranchAdmin');
 Route::post('/branch-admin-dashboard','BranchAdminController@BranchAdminDashboard');
 Route::get('/edit-branch-admin/{id}','BranchAdminController@EditBranchAdmin');
 Route::post('/update-branch-admin/{id}','BranchAdminController@UpdateBranchAdmin');
  Route::get('/delete-branch-admin/{id}','BranchAdminController@DeleteBranchAdmin');

 




//category related......................
Route::get('/add-category','CategoryController@index');
Route::get('/all-category','CategoryController@all_category');
Route::post('/save-category','CategoryController@save_category');
Route::get('/edit-category/{category_id}','CategoryController@edit_category');
Route::post('/update-category/{category_id}','CategoryController@update_category');
Route::get('/delete-category/{category_id}','CategoryController@delete_category');
Route::get('/unactive_category/{category_id}','CategoryController@unactive_category');
Route::get('/active_category/{category_id}','CategoryController@active_category');



//Manufacture or brands route here
Route::get('/add-manufacture','ManufactureController@index');
Route::post('/save-manufacture','ManufactureController@save_manufacture');
Route::get('/all-manufacture','ManufactureController@all_manufacture');
Route::get('/delete-manufacture/{manufacture_id}','ManufactureController@delete_manufacture');
Route::get('/edit-manufacture/{manufacture_id}','ManufactureController@edit_manufacture');
Route::post('/update-manufacture/{manufacture_id}','ManufactureController@update_manufacture');
Route::get('/unactive_manufacture/{manufacture_id}','ManufactureController@unactive_manufacture');
Route::get('/active_manufacture/{manufacture_id}','ManufactureController@active_manufacture');


//Product routes are here
Route::get('/add-product','ProductController@index');
Route::post('/save-product','ProductController@save_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::post('/update-product/{product_id}','ProductController@update_product');
Route::get('/all-product','ProductController@all_product');
Route::get('/unactive_product/{product_id}','ProductController@unactive_product');
Route::get('/active_product/{product_id}','ProductController@active_product');


//Card Routes Here
Route::get('/add-card','CardController@index');
Route::post('/save-card','CardController@save_card');
Route::get('/all-card','CardController@all_card');
Route::get('/unactive_card/{card_id}','CardController@unactive_card');
Route::get('/active_card/{card_id}','CardController@active_card');
// Route::get('/delete-category/{category_id}','CategoryController@delete_category');


//Branding Routes Here
Route::get('/all-brand-status','CardController@AllBrandStatus');
Route::get('/unactive_brand/{brand_id}','CardController@unactive_brand');
Route::get('/active_brand/{brand_id}','CardController@active_brand');


//Slider routes are here
Route::get('/add-slider','SliderController@index');
Route::post('/save-slider','SliderController@save_slider');
Route::get('/all-slider','SliderController@all_slider');
Route::get('/unactive_slider/{slider_id}','SliderController@unactive_slider');
Route::get('/active_slider/{slider_id}','SliderController@active_slider');
Route::get('/delete-slider/{slider_id}','SliderController@delete_slider');


//Order manage routes are here..............
Route::get('/unactive_order/{order_id}','SuperAdminController@unactive_order');
Route::get('/delete-order/{order_id}','SuperAdminController@delete_order');

//Order delivery routes are here..............
Route::get('/delivery_man','HomeController@Delivery');