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

//Route::get('/insert','HomeController@insert');



Route::get('Eshopper', function () {
    return view('frontend_view/login');
});


Route::group(['middleware' => ['checkLogin']], function () {
	Route::get('/', function () {
    return view('auth/login');
    
    });
	
	
});
Route::group(['middleware' => ['checkout']], function () {
	Route::get('/checkout','frontend\FrontController@checkout');
	Route::post('/discount_checkout','frontend\FrontController@discount_checkout');
	});


	Route::get('forgot_email', 'frontend\FrontController@forgot_email');
	Route::get('/contactUs','frontend\FrontController@contactUs');
    Route::get('/address','frontend\FrontController@address');
    Route::post('/add_user_address','frontend\FrontController@add_user_address');
	Route::get('/list_address','frontend\FrontController@list_address');
	Route::get('/edit_address/{id}','frontend\FrontController@edit_address');
	Route::post('/update_address/{id}','frontend\FrontController@update_address');
	Route::post('/delete_address/{id}', 'frontend\FrontController@delete_address');
	Route::get('/profile','frontend\FrontController@profile');
	Route::get('/edit_profile/{id}','frontend\FrontController@edit_profile');
	Route::post('/update_profile/{id}','frontend\FrontController@update_profile');
	Route::get('/password','frontend\FrontController@password');
	Route::post('/update_password/{id}','frontend\FrontController@update_password');
	Route::post('/add_review','frontend\FrontController@add_review');
	Route::get('/list_querry','frontend\FrontController@list_querry');
	Route::post('/delete_querry/{id}', 'frontend\FrontController@delete_querry');
	Route::get('/track_order','frontend\FrontController@track_order');
	Route::get('/add_wishlist/{id}','frontend\FrontController@add_wishlist');
	Route::get('/search_pro/{name}','frontend\FrontController@search_pro');
	Route::get('/remove_wish/{id}','frontend\FrontController@remove_wish');
	Route::get('/list_whislist','frontend\FrontController@list_whislist');
	Route::post('/order_status','frontend\FrontController@order_status');
	Route::get('/chk_email','frontend\FrontController@chk_email');
	Route::get('/product_detail/{id}','frontend\FrontController@product_detail');
	Route::get('/product/{id}','frontend\FrontController@product');
	Route::get('/add_cart/{id}','frontend\FrontController@add_cart');
	Route::get('/remove_item/{id}','frontend\FrontController@remove_item');
	Route::get('/remove_cartitem/{id}','frontend\FrontController@remove_cartitem');
	Route::get('/update_cart/{id}/{qty}/{pro}','frontend\FrontController@update_cart');
	Route::get('/qty_cart/{id}/{qty}','frontend\FrontController@qty_cart');
	Route::post('/coupon_chk','frontend\FrontController@coupon_chk');
	Route::post('/add_chimp','frontend\FrontController@add_chimp');
	Route::post('/get_range','frontend\FrontController@get_range');
	Route::post('/get_cat_range','frontend\FrontController@get_cat_range');
	Route::post('/paypal_chk','frontend\FrontController@paypal_chk');
	Route::get('/return_url','frontend\FrontController@return_url');
	Route::get('/cancel_url','frontend\FrontController@cancel_url');
	Route::get('/cms_content/{id}','frontend\FrontController@cms_content');
	Route::post('/add_address','frontend\FrontController@add_address');
	Route::post('/sendMail','Auth\ResetPasswordController@index');
	Route::get('/index','frontend\FrontController@index');
	//Route::get('/checkout','frontend\FrontController@checkout');
	Route::get('/cart','frontend\FrontController@cart');
	Route::get('/frontLogin','frontend\FrontController@frontLogin');
	Route::get('/shop','frontend\FrontController@shop');
	Route::get('/blog','frontend\FrontController@blog');
	Route::get('/blogSingle','frontend\FrontController@blogsingle');
	
	Route::group(['middleware' => ['checkAddress']], function () {
    Route::post('/final_chk','frontend\FrontController@final_chk');
});

Route::post('pass_mail', 'frontend\FrontController@pass_mail');
Auth::routes();

Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');

Route::group(['middleware' => ['checkRole']], function () {
   
//Route::get('/admin','HomeController@list');
//Route::get('/dashboard', 'HomeController@dashboard');	
Route::get('/user/list', 'HomeController@list');
Route::get('/user_data', 'HomeController@user_data');
Route::get('/product_attribute_data', 'HomeController@product_attribute_data');
Route::get('/edit/{id}', 'HomeController@edit');
Route::get('/add/user/view', 'HomeController@add_user_view');
Route::post('/update/user/{id}', 'HomeController@update');
Route::post('/add/user', 'HomeController@add_user');
Route::post('/delete/user/{id}', 'HomeController@delete');
Route::get('/config', 'HomeController@config');
Route::post('/add_config', 'HomeController@add_config');
Route::get('/config_list', 'HomeController@list_config');
Route::get('/config_data', 'HomeController@config_data');
Route::post('/delete_config/{id}', 'HomeController@delete_config');
Route::get('/edit_view/{id}', 'HomeController@edit_view');
Route::post('/edit_config/{id}', 'HomeController@edit_config');
Route::get('/banner', 'HomeController@banner');
Route::post('/add_banner', 'HomeController@add_banner');
Route::get('/list_banner', 'HomeController@list_banner');
Route::get('/banner_data', 'HomeController@banner_data');
Route::get('/edit_banner_view/{id}', 'HomeController@edit_banner_view');
Route::post('/edit_banner/{id}', 'HomeController@edit_banner');
Route::post('/delete_banner/{id}', 'HomeController@delete_banner');
Route::get('/list_category', 'HomeController@list_category');
Route::get('/category_data', 'HomeController@category_data');
Route::get('/category', 'HomeController@category');
Route::post('/add_category', 'HomeController@add_category');
Route::post('/delete_category/{id}', 'HomeController@delete_category');
Route::get('/edit_category/{id}', 'HomeController@edit_category');
Route::post('/update_category/{id}', 'HomeController@update_category');
Route::get('/list_product', 'HomeController@list_product');
Route::get('/product_data', 'HomeController@product_data');
Route::get('/product', 'HomeController@product');
Route::get('get_product_value/{value_id}', 'HomeController@get_product_value');
Route::get('/get_product_attr', 'HomeController@get_product_attr');
Route::post('/add_product', 'HomeController@add_product');
Route::get('/edit_product/{id}', 'HomeController@edit_product');
Route::post('/update_product/{id}', 'HomeController@update_product');
Route::post('/delete_product/{id}', 'HomeController@delete_product');
Route::get('/product_atrribute', 'HomeController@product_atrribute');
Route::post('/add_product_attribute', 'HomeController@add_product_attribute');
Route::get('/list_product_attribute', 'HomeController@list_product_attribute');
Route::post('/delete_attribute/{id}', 'HomeController@delete_attribute');
Route::get('/edit_attribute/{id}', 'HomeController@edit_attribute');
Route::post('/update_attribute/{id}', 'HomeController@update_attribute');
Route::get('/coupon', 'HomeController@coupon');
Route::post('/add_coupon', 'HomeController@add_coupon');
Route::get('/list_coupon', 'HomeController@list_coupon');
Route::get('/coupon_data', 'HomeController@coupon_data');
Route::post('/delete_coupon/{id}', 'HomeController@delete_coupon');
Route::get('/edit_coupon/{id}', 'HomeController@edit_coupon');
Route::post('/update_coupon/{id}', 'HomeController@update_coupon');
Route::get('/list_review', 'HomeController@list_review');
Route::get('/review_data', 'HomeController@review_data');
Route::get('/coupon_report', 'HomeController@coupon_report');
Route::get('/customer', 'HomeController@customer');
Route::get('/customer_data', 'HomeController@customer_data');
Route::get('/coup_data', 'HomeController@coup_data');
Route::get('/sales', 'HomeController@sales');
Route::get('/sales_data', 'HomeController@sales_data');
Route::get('/order_table', 'HomeController@order_table');
Route::get('/order_data', 'HomeController@order_data');
Route::get('/show_order/{id}', 'HomeController@show_order');
Route::get('/edit_order/{id}', 'HomeController@edit_order');
Route::post('/update_order/{id}', 'HomeController@update_order');
Route::get('/show_payment', 'HomeController@show_payment');
Route::post('/add_payment', 'HomeController@add_payment');
Route::get('/list_payment', 'HomeController@list_payment');
Route::get('/payment_data', 'HomeController@payment_data');
Route::post('/delete_payment/{id}', 'HomeController@delete_payment');
Route::get('/show_cms', 'HomeController@show_cms');
Route::post('/add_cms', 'HomeController@add_cms');
Route::get('/list_cms', 'HomeController@list_cms');
Route::get('/cms_data', 'HomeController@cms_data');
Route::post('/delete_cms/{id}', 'HomeController@delete_cms');
Route::get('/edit_cms/{id}', 'HomeController@edit_cms');
Route::get('/edit_payment/{id}', 'HomeController@edit_payment');
Route::post('/update_cms/{id}', 'HomeController@update_cms');
Route::post('/update_payment/{id}', 'HomeController@update_payment');
Route::get('/show_email', 'HomeController@show_email');
Route::post('/add_email', 'HomeController@add_email');
Route::get('/list_email', 'HomeController@list_email');
Route::get('/email_data', 'HomeController@email_data');
Route::post('/delete_email/{id}', 'HomeController@delete_email');
Route::get('/edit_email/{id}', 'HomeController@edit_email');
Route::post('/update_email/{id}', 'HomeController@update_email');
Route::get('/send_responce/{id}', 'HomeController@send_responce');
Route::post('/responce_mail', 'HomeController@responce_mail');
Route::post('/delete_feedback/{id}', 'HomeController@delete_feedback');




});

//Route::get('/admin','HomeController@list')->middleware('checkRole');	

Route::get('/home', 'HomeController@dashboard')->middleware('checkRole');



