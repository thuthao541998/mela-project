<?php

//Route::get('/', function (){
//    return view('layouts.master');
//});

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

Route::resource('admin/product','ProductController');

Route::resource('admin/order','OrderController');

Route::resource('admin/order-detail','OrderDetailController');

Route::resource('admin/article', 'ArticleController');

Route::resource('admin/category', 'CategoryController');

Route::resource('admin/brand','BrandController');

Route::get('admin/404',function (){
    return view('admin.404.404');
});



Route::get("/admin/article/get-json/{id}", "ArticleController@showJson");
Route::put("/admin/article/update-json/{id}", "ArticleController@quickUpdate");

Route::get("/admin/brand/get-json/{id}", "BrandController@showJson");
Route::put("/admin/brand/update-json/{id}", "BrandController@quickUpdate");

Route::get("/admin/category/get-json/{id}", "CategoryController@showJson");
Route::put("/admin/category/update-json/{id}", "CategoryController@quickUpdate");

Route::get("/admin/order/get-json/{id}", "OrderController@showJson");
Route::put("/admin/order/update-json/{id}", "OrderController@quickUpdate");

Route::get("/admin/product/get-json/{id}", "ProductController@showJson");
Route::put("/admin/product/update-json/{id}", "ProductController@quickUpdate");