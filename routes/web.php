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