<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index')->middleware('homepage');

Route::get('/dashboard', 'CustomerController@dashboard')->name('customer.dashboard');
Route::get('/user/{user}/account', 'CustomerController@accountIndex')->name('customer.account.index');
Route::get('/user/{user}/account/profile', 'CustomerController@accountEdit')->name('customer.account.edit');
Route::patch('/user/{user}/account/profile', 'CustomerController@accountUpdate')->name('customer.account.update');
