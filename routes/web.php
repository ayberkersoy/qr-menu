<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('basket', 'BasketController');
Route::resource('order', 'OrderController');
