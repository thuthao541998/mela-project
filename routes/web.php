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
Route::get('/product/{id}',"ProductController@showClient");
Route::get('/list-product/search', 'ProductController@search')->name('search.action');
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
//Contact
Route::get('/contact-us','ContactController@index');
Route::post('/contact-us','ContactController@save');
//Article
Route::get('/list-article', "ArticleController@indexClient");
Route::get('/article/{id}', 'ArticleController@showClient');
//Cart
Route::get('/add-to-cart', 'CartController@addToCart');
Route::post('/api-add-to-cart', 'CartController@addToCartApi');
Route::get('/cart', 'CartController@showCart');
Route::get('/cart-remove/{id}', 'CartController@removeCart');
Route::post('/order-success','CartController@checkoutCart');
Route::put('/sua-gio-hang', 'CartController@updateCart');
Route::get('/admin/order/update-status/{id}', 'OrderController@updateStatus');
Route::get('/admin/list-order', 'OrderController@index');
//Chart
Route::get('/api-get-chart-data', 'OrderController@getChartDataApi');
Route::get('/api-get-data-to-time', 'OrderController@getDataToTimeApi');

Route::get('/api-get-pie-chart-data', 'OrderDetailController@getPieChartDataApi');
//Dashboard
Route::get('/home', 'HomeController@index')->name('home');
//*********************************Auth Zone*********************************
Route::group(['middleware' => ['checkGuest']],function (){
    Route::post('login',['as' => 'login', 'uses' => 'Auth\LoginController@login']);
    Route::post('/register',['as' => 'register', 'uses' => 'Auth\RegisterController@register']);
    Route::get('/client-login',['as' => 'client.login','uses' => 'Auth\LoginController@index']);

});
Route::post('/logout',['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
Route::post('/post-comment','CommentController@store');
Route::post('/delete-comment','CommentController@destroy');
//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{provider}/redirect', 'SocialAuthController@redirect');
Route::get('/{provider}/callback', 'SocialAuthController@callback');
//Login with Zalo
Route::get('/zaloLogin',function(){
   return redirect('https://oauth.zaloapp.com/v3/auth?app_id=3902778407091030839&redirect_uri='.url('callbackZalo'));
});
Route::get('/callbackZalo', 'SocialAuthController@callbackZalo');
Route::get('/callbackZalo1', function (){
    return 'OK';
});

// *********************************ROUTE ADMIN Zone*********************************
//Route::get('/admin-login', function (){
//    return view('admin.login');
//});
//    Auth Admin
Route::group(['middleware' => ['sellUserGuest']],function (){

    Route::get('admin-login','AdminAuth\LoginController@index');
    Route::post('admin-login','AdminAuth\LoginController@login');
    Route::post('admin-logout','AdminAuth\LoginController@logout');
});


Route::group(['middleware' => ['sellUserAuth']],function (){

    Route::group(['middleware' => ['checkAdminAccount']],function (){
        Route::get('admin-register', 'AdminAuth\RegisterController@index');
        Route::post('admin-register', 'AdminAuth\RegisterController@register');
    });
    
    Route::get('/admin', function (){
        return view('admin.dashboard');
    });

    Route::resource('admin/product','ProductController');

    Route::resource('admin/order','OrderController');

    Route::resource('admin/order-detail','OrderDetailController');

    Route::resource('admin/article', 'ArticleController');

    Route::resource('admin/category', 'CategoryController');
    Route::resource('admin/brand','BrandController');

    Route::get('/admin/order/{id}', 'OrderController@show');
    Route::get('/admin/order/update-status/{id}', 'OrderController@updateStatus');
    Route::get('/admin/list-order', 'OrderController@index');

    Route::post("admin/product/destroy-many",'ProductController@destroyMany');
    Route::post("admin/category/destroy-many", "CategoryController@destroyMany");
    Route::post("admin/article/destroy-many", "ArticleController@destroyMany");
    Route::post("admin/brand/destroy-many", "CategoryController@destroyMany");

    Route::post('admin/order/update-status-many','OrderController@updateStatusMany');

    Route::get("/admin/article/get-json/{id}", "ArticleController@showJson");
    Route::put("/admin/article/update-json/{id}", "ArticleController@quickUpdate");

    Route::get("/admin/product/get-json/{id}", "ProductController@showJson");
    Route::put("/admin/product/update-json/{id}", "ProductController@quickUpdate");
    Route::get("/admin/client","UserController@index");
});

//*********************************Error Zone*********************************
Route::get('/404',function (){
    return view('errors.404');
}) -> name('errors.404');
Route::get('/admin/dash-board', function (){
   return view('admin.dashboard');
});

//Subscription newsletter
Route::get('/admin/newsletter/create','ContactController@showMail');
Route::post('/admin/newsletter/create','ContactController@sendSubscriptionMail');
Route::get('/admin/newsletter/list', function (){
    return view('admin.contact.list_newsletter');
});
Route::get('/admin/contact/list', function (){
    return view('admin.contact.list_contact');
});
