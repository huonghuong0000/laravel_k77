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
// , 'middleware' => 'productId']

Route::group(['namespace' => 'Client'], function () {
    // // Route::get('', 'HomeController@index')->middleware('productId'); //cách 1: trở trực tiếp đến
    // Route::get('', [
    //     'uses' => 'HomeController@index',
    //     'middleware' => ['productId', 'guest']
    // ]); //cách 2: truyền nhiều thì dùng mảng

    Route::group(['prefix' => 'home'], function() {
        Route::get('', 'HomeController@index');
        Route::get('about', 'HomeController@about');
        Route::get('contact', 'HomeController@contact') ;
    });

    Route::group(['prefix' => 'cart'], function () {
        Route::get('', 'CartController@cart') ;
        Route::get('checkout', 'CartController@checkout') ;
        Route::get('complete', 'CartController@complete') ;
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('', 'ProductController@shop') ;
        Route::get('detail/{id}', 'ProductController@detail') ;
    });
});