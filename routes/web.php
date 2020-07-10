<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); // TBREMOVED

Route::get('/', 'HomeController@index')->middleware('homepage');

// Customer
Route::group(['namespace' => 'Customer'], function () {
    Route::get('/dashboard', 'DashboardController@dashboard')->name('customer.dashboard');
        Route::group(['prefix' => '/user'], function () {
            Route::get('/{user}/account', 'AccountController@index')->name('customer.account.index');
            Route::get('/{user}/account/profile', 'AccountController@edit')->name('customer.account.edit');
            Route::patch('/{user}/account/profile', 'AccountController@update')->name('customer.account.update');
        });
});

// Admin
Route::group(['namespace' => 'Admin'], function () {
    Route::get('/admin', 'DashboardController@index')->name('admin.dashboard');
});