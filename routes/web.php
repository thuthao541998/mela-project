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


//**************************Client Zone*********************************

Route::get('/','CategoryController@indexClient');
Route::get('/list-product',"ProductController@indexClient");
Route::get('/product/{id}',"ProductController@show");
Route::get('/brand/{id}',"BrandController@detailBrand");
Route::get('/cart',function (){
    return view('client.cart.cart');
});
Route::get('/test',function (){
    return view('client.product.test');
});
Route::get('/about-us',function (){
    return view('client.aboutUs');
});
Route::get('/contact-us',function (){
    return view('client.contactUs');
});
Route::get('/list-article', "ArticleController@indexClient");
Route::get('/article/{id}', 'ArticleController@showClient');
Route::get('/add-to-cart', 'CartController@addToCart');
Route::post('/api-add-to-cart', 'CartController@addToCartApi');
Route::get('/cart', 'CartController@showCart');
Route::get('/cart-remove/{id}', 'CartController@removeCart');
Route::post('/check-out','CartController@checkoutCart');
Route::put('/sua-gio-hang', 'CartController@updateCart');
Route::get('/admin/order/update-status/{id}', 'OrderController@updateStatus');
Route::get('/admin/list-order', 'OrderController@index');
Route::get('/api-get-chart-data', 'OrderController@getChartDataApi');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/list-product/search', 'ProductController@search')->name('search.action');

//*********************************Auth Zone*********************************
Route::post('/login',['as' => 'login', 'uses' => 'Auth\LoginController@login']);
Route::post('/logout',['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
//Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/client-login',['as' => 'client.login',function (){
    return view('client.login');
}]);
Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');

// *********************************ROUTE ADMIN Zone*********************************
Route::get('/admin-login', function (){
    return view('admin.login');
});

Route::group(['middleware' => ['checkLogin']],function (){

    Route::get('/admin', 'ProductController@index');

    Route::resource('admin/product','ProductController');

    Route::resource('admin/order','OrderController');

    Route::resource('admin/order-detail','OrderDetailController');

    Route::resource('admin/article', 'ArticleController');

    Route::resource('admin/category', 'CategoryController');

    Route::resource('admin/brand','BrandController');

    Route::post("admin/product/destroy-many",'ProductController@destroyMany');
    Route::post("admin/category/destroy-many", "CategoryController@destroyMany");
    Route::post("admin/article/destroy-many", "ArticleController@destroyMany");
    Route::post("admin/brand/destroy-many", "CategoryController@destroyMany");



    Route::get("/admin/article/get-json/{id}", "ArticleController@showJson");
    Route::put("/admin/article/update-json/{id}", "ArticleController@quickUpdate");

    Route::get("/admin/product/get-json/{id}", "ProductController@showJson");
    Route::put("/admin/product/update-json/{id}", "ProductController@quickUpdate");
});

//*********************************Error Zone*********************************
Route::get('admin/404',function (){
    return view('admin.404.404');
});

