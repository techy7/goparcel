<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('homepage')->name('home');

Route::get('/', 'HomeController@index')->middleware('homepage')->name('index');

Route::get('/track-delivery', 'Customer\PickupController@trackDelivery')->name('track-delivery');
Route::get('/track-delivery/track/', 'Customer\PickupController@trackDeliveryShow')->name('track-delivery.show');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['namespace' => 'Customer'], function () {
        Route::get('/{username}/dashboard', 'DashboardController@dashboard')->name('customer.dashboard');
        Route::get('/{username}/pickup', 'PickupController@index')->name('customer.pickup');
        Route::post('/{username}/pickup', 'PickupController@store')->name('customer.pickup.store');
        Route::get('{username}/computeTotal', 'PickupController@computeTotal')->name('customer.pickups.computeTotal');
        Route::get('/user/{username}/account', 'AccountController@index')->name('customer.account');
        Route::get('/user/{username}/account/edit', 'AccountController@edit')->name('customer.account.edit');
        Route::patch('/user/{username}/account/update', 'AccountController@update')->name('customer.account.update');
        Route::get('/{username}/pickup-bookings', 'BookingController@index')->name('customer.bookings');
        Route::get('/{username}/pickup-bookings/track/{tracking_number}', 'BookingController@track')->name('customer.bookings.track');
        Route::get('/{username}/pickup-bookings/search', 'BookingController@searchTrack')->name('customer.bookings.searchTrack');
        Route::get('/{username}/pickup-bookings/{id}/waybill', 'BookingController@waybill')->name('customer.bookings.waybill');
    });

        Route::get('/admin-dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
        Route::group(['prefix' => '/admin', 'namespace' => 'Admin'], function () {
        Route::get('/users', 'UserController@index')->name('admin.users');
        Route::get('/users/create', 'UserController@create')->name('admin.users.create');
        Route::post('/users', 'UserController@store')->name('admin.users.store');
        Route::get('/users/{username}/edit', 'UserController@edit')->name('admin.users.edit');
        Route::patch('/users/{username}', 'UserController@update')->name('admin.users.update');
        Route::get('/users/{username}/confirmation', 'UserController@destroyConfirmation')->name('admin.users.destroy-confirmation');
        Route::delete('/users/{username}', 'UserController@destroy')->name('admin.users.destroy');
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
        Route::get('/customers', 'CustomerController@index')->name('admin.customers');
        Route::get('/customers/create', 'CustomerController@create')->name('admin.customers.create');
        Route::post('/customers', 'CustomerController@store')->name('admin.customers.store');
        Route::get('/customers/{username}/edit', 'CustomerController@edit')->name('admin.customers.edit');
        Route::patch('/customers/{username}', 'CustomerController@update')->name('admin.customers.update');
        Route::get('/customers/{username}/confirmation', 'CustomerController@destroyConfirmation')->name('admin.customers.destroy-confirmation');
        Route::put('/customers/{username}', 'CustomerController@softDestroy')->name('admin.customers.soft-destroy');
        Route::get('/customers/{username}', 'CustomerController@showPickups')->name('admin.customers.showPickups');
        Route::get('/bookings', 'BookingController@index')->name('admin.bookings');
        Route::get('/bookings/{username}/edit', 'BookingController@edit')->name('admin.bookings.edit');
        Route::patch('/bookings/{username}', 'BookingController@update')->name('admin.bookings.update');
        Route::get('/bookings/{pickup}/confirmation', 'BookingController@destroyConfirmation')->name('admin.bookings.destroy-confirmation');
        Route::delete('/bookings/{pickup}', 'BookingController@destroy')->name('admin.bookings.destroy');
        Route::get('/pickups', 'PickupController@index')->name('admin.pickups');
        Route::get('/pickups/filter', 'PickupController@filter')->name('admin.pickup.filter');
        Route::get('/pickups/{pickup}/edit', 'PickupController@edit')->name('admin.pickups.edit');
        Route::patch('/pickups/{pickup}', 'PickupController@update')->name('admin.pickups.update');
        Route::get('/pickups/{pickup}/confirmation', 'PickupController@destroyConfirmation')->name('admin.pickups.destroy-confirmation');
        Route::put('/pickups/{pickup}', 'PickupController@softDestroy')->name('admin.pickups.soft-destroy');
        Route::get('/pickups/new-request', 'PickupController@newRequest')->name('admin.pickups.new-request');
        Route::get('/packages', 'PackageController@index')->name('admin.packages');
        Route::get('/packages/create', 'PackageController@create')->name('admin.packages.create');
        Route::post('/packages', 'PackageController@store')->name('admin.packages.store');
        Route::get('/packages/{package}/edit', 'PackageController@edit')->name('admin.packages.edit');
        Route::patch('/packages/{package}', 'PackageController@update')->name('admin.packages.update');
        Route::get('/packages/{package}/confirmation', 'PackageController@destroyConfirmation')->name('admin.packages.destroy-confirmation');
        Route::delete('/packages/{package}', 'PackageController@destroy')->name('admin.packages.destroy');
    });
});
