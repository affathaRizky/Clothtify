<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/test', function () {
    return view('testView');
});

Route::get('/test2', function () {
    return view('testView2');
});

Route::get('/homeAdmin', function () {
    return view('pages.admin.homeAdmin');
});

Route::get('/productManagement', function () {
    return view('pages.admin.productManagement');
});

Route::get('/orderManagement', function () {
    return view('pages.admin.orderManagement');
});

Route::prefix('pages')->group(function () {
    Route::view('/', 'pages.home')->name('home');
    Route::view('/produk', 'pages.product')->name('product');
    Route::view('/gallery', 'pages.gallery')->name('gallery');
    Route::view('/aboutUs', 'pages.aboutUs')->name('aboutUs');
    Route::view('/login', 'pages.login')->name('login');
    Route::view('/register', 'pages.register')->name('register');
    Route::view('/forgotPassword', 'pages.forgotPassword')->name('forgotPassword');
    Route::view('/productDetail', 'pages.productDetail')->name('productDetail');
    Route::view('/checkout', 'pages.checkoutPage')->name('checkout');
});

Route::prefix('pages.admin')->group(function () {
    Route::view('/homeAdmin', 'pages.admin.homeAdmin')->name('homeAdmin');
    Route::view('/productManagement', 'pages.admin.productManagement')->name('productManagement');
    Route::view('/orderManagement', 'pages.admin.orderManagement')->name('orderManagement');
    Route::view('/categoryManagement', 'pages.admin.categoryManagement')->name('categoryManagement');
    // Route::view('/aboutUs', 'pages.aboutUs')->name('aboutUs');
});