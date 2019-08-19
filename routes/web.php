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

// Route::group(['namespace' => 'Client'], function () {

    
Route::group(['prefix' => 'home'], function() {
    Route::get('', [
        'as' => 'client.home.index',
        'uses' => 'HomeController@index'
    ]);
    Route::get('about', [
        'as' => 'client.home.about',
        'uses' => 'HomeController@about'
    ]);  //client.home.about
    Route::get('contact', [
        'as' => 'client.home.contact',
        'uses' => 'HomeController@contact'
    ]) ;
});

Route::group(['prefix' => 'cart'], function () {
    Route::get('', [
        'as' => 'client.cart.cart',
        'uses' => 'CartController@cart'
    ]) ;
    Route::get('checkout', [
        'as' => 'client.cart.checkout',
        'uses' => 'CartController@checkout'
    ]) ;
    Route::get('complete', [
        'as' => 'client.cart.complete',
        'uses' => 'CartController@complete'
    ]) ;
});

Route::post('cart/add', 'CartController@add');
Route::post('cart/update', 'CartController@update');
Route::post('cart/destroy', 'CartController@destroy');
Route::post('cart/store', 'CartController@store');

Route::group(['prefix' => 'product'], function () {
    Route::get('', [
        'as' => 'client.product.shop',
        'uses' => 'ProductController@shop'
    ]) ;
    Route::get('detail/{id}', [
        'as' => 'client.product.detail',
        'uses' => 'ProductController@detail'
    ]) ;
});
// });