<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/track-delivery', 'Customer\PickupController@trackDelivery')->name('track-delivery');
Route::get('/track-delivery/{tracking_number}', 'Customer\PickupController@trackDeliveryShow')->name('track-delivery.show');