<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('basket', 'BasketController@index')->name('basket.index');
Route::post('basket', 'BasketController@store')->name('basket.store');
