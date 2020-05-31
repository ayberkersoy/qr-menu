<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('basket', 'BasketController');
Route::resource('order', 'OrderController');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.home');

    Route::resource('products', 'ProductController');
    Route::resource('orders', 'OrderController');
    Route::resource('categories', 'CategoryController');
});
