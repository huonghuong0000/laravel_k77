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


Route::group(['middleware' => 'auth'], function() {
    
    Route::get('', [
        'as' => 'admin.dashboard.index',
        'uses' => 'DashboardController@index'
    ]);
    
    Route::get('products/{id}/del', [
        'as' => 'admin.products.del',
        'uses' => 'ProductController@del'
    ]);
    
    Route::resource('products', 'ProductController', [
        'as' => 'admin',
        'parameters' => ['products' => 'id']
    ]);
    
    Route::get('users/{id}/del', [
        'as' => 'admin.users.del',
        'uses' => 'UserController@del'
    ]);

    Route::resource('users', 'UserController', [
        'as' => 'admin',
        'parameters' => ['users' => 'id']
    ]);
    
    Route::resource('categories', 'CategoryController', [
        'as' => 'admin',
        'parameters' => ['categories' => 'id']
    ]);
    
    Route::get('orders/processed', [
        'as' => 'admin.orders.processed',
        'uses' => 'OrderController@processed'
    ]);
    
    Route::resource('orders', 'OrderController', [
        'as' => 'admin',
        'parameters' => ['orders' => 'id']
    ]);
});

//login-logout
Route::get('login', [
    'as' => 'admin.login.showLoginForm',
    'uses' => 'Auth\LoginController@showLoginForm'
]);

Route::post('login', [
    'as' => 'admin.login.login',
    'uses' => 'Auth\LoginController@login'
]);

Route::post('logout', [
    'as' => 'admin.login.logout',
    'uses' => 'Auth\LoginController@logout'
]);

