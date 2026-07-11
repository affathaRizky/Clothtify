<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukManageController;
use App\Http\Controllers\UserManageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminDashboardController;

Route::get('/', function () {
    return view('pages.home');
});

Route::prefix('pages')->group(function () {
    // Route Frontend User
    Route::view('/', 'pages.home')->name('home');
    Route::view('/produk', 'pages.product')->name('product');
    Route::view('/gallery', 'pages.gallery')->name('gallery');
    Route::view('/aboutUs', 'pages.aboutUs')->name('aboutUs');
    Route::view('/login', 'pages.login')->name('login');
    Route::view('/register', 'pages.register')->name('register');
    Route::view('/forgotPassword', 'pages.forgotPassword')->name('forgotPassword');
    Route::get('/history', [HistoryController::class, 'history'])->name('history');

    Route::get('/debug-session', function () {
        return view('pages.debugSession');
    })->name('debug.session');

    // Route Backend User
    Route::post('/login', [LoginController::class, 'processLogin'])->name('process.login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/register', [RegistController::class, 'register'])->name('process.register');
    Route::post('/order', [OrderController::class, 'addOrder'])->name('addorder');
    Route::get('/checkout', [CheckoutController::class, 'AddressHandler'])->name('checkout');
    Route::get('/produk', [ProductController::class, 'index'])->name('product');
    Route::get('/productDetail/{id}', [ProductController::class, 'detail'])->name('productdetail');
    Route::post('/checkout', [CheckoutController::class, 'storeData'])->name('checkout.store.data');
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart');
    Route::post('/cart/update/{id}', [CartController::class, 'updateCartQty'])->name('cart.updateQty');
    Route::post('/cart/remove/{id}', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('/cart/checkout-all', [CartController::class, 'checkoutAll'])->name('cart.checkoutAll');
    Route::post('/cart/checkout-single/{id}', [CartController::class, 'checkoutSingle'])->name('cart.checkoutSingle');
    Route::post('/forgotPassword', [ForgotPasswordController::class, 'sendOtp'])->name('forgot.password.send.otp');
    Route::get('/forgotPassword/verify', [ForgotPasswordController::class, 'showVerifyForm'])->name('forgot.verify.form');
    Route::post('/forgotPassword/verify', [ForgotPasswordController::class, 'verifyOtp'])->name('forgot.password.verify.otp');
    Route::post('/history/done/{id}', [HistoryController::class, 'markAsDone'])->name('history.done')->middleware('auth');
});

Route::prefix('pages.admin')->group(function () {
    // Route Frontend Admin
    Route::view('/productManagement', 'pages.admin.productManagement')->name('productManagement');
    Route::view('/orderManagement', 'pages.admin.orderManagement')->name('orderManagement');
    Route::view('/categoryManagement', 'pages.admin.categoryManagement')->name('categoryManagement');
    Route::view('/userManagement', 'pages.admin.user_management')->name('userManagement');

    // Route Backend Admin
    Route::get('/userManagement', [UserManageController::class, 'showData'])->name('userManagement');
    Route::post('/addUser', [UserManageController::class, 'addUser'])->name('addUser');
    Route::post('/updateUser/{id}', [UserManageController::class, 'updateUser'])->name('update.user');
    Route::delete('/deleteUser/{id}', [UserManageController::class, 'deleteUser'])->name('deleteUser');
    Route::post('/addKategori', [KategoriController::class, 'addKategori'])->name('addKategori');
    Route::delete('/deleteKategori/{id}', [KategoriController::class, 'deleteKategori'])->name('deleteKategori');
    Route::get('/categoryManagement', [KategoriController::class, 'showKategori'])->name('categoryManagement');
    Route::post('/addProduk', [ProdukManageController::class, 'addProduk'])->name('addProduk');
    Route::get('/productManagement', [ProdukManageController::class, 'index'])->name('productManagement');
    Route::get('/orderManagement', [AdminOrderController::class, 'index'])->name('admin.orders');
    Route::get('/orders/{id}', [AdminOrderController::class, 'detail'])->name('admin.orders.detail');
    Route::post('/orders/{id}/update-status', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
    Route::post('/updateProduk/{id}', [ProdukManageController::class, 'updateProduk'])->name('updateProduk');
    Route::delete('/deleteProduk/{id}', [ProdukManageController::class, 'deleteProduct'])->name('deleteProduk');

    Route::get('/homeAdmin', [AdminDashboardController::class, 'index'])
    ->name('admin.home');
});
