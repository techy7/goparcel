<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); // TBREMOVED

Route::get('/', 'HomeController@index')->middleware('homepage');

// Customer
Route::group(['namespace' => 'Customer'], function () {
    Route::get('/{username}', 'DashboardController@dashboard')->name('customer.dashboard');
        Route::group(['prefix' => '/user'], function () {
            Route::get('/{username}/account', 'AccountController@index')->name('customer.account');
            Route::get('/{username}/account/profile', 'AccountController@edit')->name('customer.account.edit');
            Route::patch('/{username}/account/profile', 'AccountController@update')->name('customer.account.update');
        });
    Route::get('/pickup', 'PickupController@index')->name('customer.pickup');
    Route::post('/pickup', 'PickupController@store')->name('customer.pickup.store');
});

// Admin
Route::group(['namespace' => 'Admin'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
});
