<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Person;

Route::get('/person', 'PersonController@index')->name('person.index');
Route::get('/person/{person}', 'PersonController@show')->name('person.show');