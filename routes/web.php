<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); // TBREMOVED

Route::get('/', 'HomeController@index')->middleware('homepage');

// Customer
Route::group(['namespace' => 'Customer'], function () {
    // change /dashboard to /{username}
    Route::get('/dashboard', 'DashboardController@dashboard')->name('customer.dashboard');
        Route::group(['prefix' => '/user'], function () {
            Route::get('/{user}/account', 'AccountController@index')->name('customer.account');
            Route::get('/{user}/account/profile', 'AccountController@edit')->name('customer.account.edit');
            Route::patch('/{user}/account/profile', 'AccountController@update')->name('customer.account.update');
        });
    Route::get('/pickup', 'PickupController@index')->name('customer.pickup');
    Route::post('/pickup', 'PickupController@store')->name('customer.pickup.store');
});

// Admin
Route::group(['namespace' => 'Admin'], function () {
    // change /admin to /dashboard
    Route::get('/admin', 'DashboardController@index')->name('admin.dashboard');
});