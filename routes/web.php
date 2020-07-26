<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->middleware('homepage');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['namespace' => 'Customer'], function () {
        Route::get('/{username}/dashboard', 'DashboardController@dashboard')->name('customer.dashboard');
        Route::get('/{username}/pickup', 'PickupController@index')->name('customer.pickup');
        Route::post('/{username}/pickup', 'PickupController@store')->name('customer.pickup.store');
        Route::group(['prefix' => '/user'], function () {
            Route::get('/{username}/account', 'AccountController@index')->name('customer.account');
            Route::get('/{username}/account/profile', 'AccountController@edit')->name('customer.account.edit');
            Route::patch('/{username}/account/profile', 'AccountController@update')->name('customer.account.update');
        });
        Route::get('/{username}/bookings', 'BookingController@index')->name('customer.bookings');
    });

    Route::group(['namespace' => 'Admin'], function () {
        Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
    });
});