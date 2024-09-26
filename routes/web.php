<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Http\Middleware\checkuser;
use Illuminate\Support\Facades\Route;

Route::controller(ViewController::class)->group(function(){
    Route::get('/','login_page')->name('login_page');
    Route::get('/register_page','register_page')->name('register_page');
    Route::get('/index','index')->name('index')->middleware(checkuser::class);
    Route::get('/logout','logout')->name('logout')->middleware(checkuser::class);

    Route::get('/view/{id}','view')->name('view')->middleware(checkuser::class);
    Route::get('/cart','cart')->name('cart')->middleware(checkuser::class);
});

Route::controller(UserController::class)->group(function(){
    Route::post('/login','login')->name('login');
    Route::post('/register','register')->name('register');

    Route::post('/addcart/{id}','addcart')->name('addcart');
    Route::post('/addcart_view/{id}','addcart_view')->name('addcart_view');
    Route::delete('/deletecart/{id}','deletecart')->name('deletecart');
    Route::put('/checkout','checkout')->name('checkout');
});