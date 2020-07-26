<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('homepage')->name('home');

Route::get('/', 'HomeController@index')->middleware('homepage')->name('index');

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
        Route::get('/admin/dashboard', 'DashboardController@index')->name('admin.dashboard');

        Route::get('/users', 'UserController@index')->name('admin.users');
        Route::get('/users/create', 'UserController@create')->name('admin.users.create');
        Route::post('/users', 'UserController@store')->name('admin.users.store');
        Route::get('/users/{user}/edit', 'UserController@edit')->name('admin.users.edit');
        Route::patch('/users/{user}', 'UserController@update')->name('admin.users.update');
        Route::get('/users/{user}/confirmation', 'UserController@destroyConfirmation')->name('admin.users.destroy-confirmation');
        Route::delete('/users/{user}', 'UserController@destroy')->name('admin.users.destroy');

        Route::get('/roles', 'RoleController@index')->name('admin.roles');
        Route::get('/roles/create', 'RoleController@create')->name('admin.roles.create');
        Route::post('/roles', 'RoleController@store')->name('admin.roles.store');
        Route::get('/roles/{role}/show', 'RoleController@show')->name('admin.roles.show');
        Route::get('/roles/{role}/edit', 'RoleController@edit')->name('admin.roles.edit');
        Route::patch('/roles/{role}', 'RoleController@update')->name('admin.roles.update');
        Route::delete('/roles/{role}', 'RoleController@destroy')->name('admin.roles.destroy');

        Route::get('/permissions', 'PermissionController@index')->name('admin.permissions');
        Route::get('/permissions/create', 'PermissionController@create')->name('admin.permissions.create');
        Route::post('/permissions', 'PermissionController@store')->name('admin.permissions.store');
        Route::get('/permissions/{permission}/edit', 'PermissionController@edit')->name('admin.permissions.edit');
        Route::patch('/permissions/{permission}', 'PermissionController@update')->name('admin.permissions.update');
        Route::delete('/permissions/{permission}', 'PermissionController@destroy')->name('admin.permissions.destroy');

    });
});
