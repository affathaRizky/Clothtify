<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/produk', function () {
    return view('produk');
})->name('produk');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/lupaPassword', function () {
    return view('lupaPassword');
})->name('lupaPassword');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

Route::get('/galeri', function () {
    return view('galeri');
})->name('galeri');