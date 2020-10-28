<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Dashboard
Route::prefix('dashboard')->group(function () {
    // Trang chủ dashboard
    Route::get('/',[\App\Http\Controllers\backend\DashboardController::class,'index'])->name('backend.dashboard');
    // Quản lý sản phẩm
    Route::prefix('products')->group(function(){
        Route::get('/', [\App\Http\Controllers\backend\ProductController::class,'index'])->name('backend.product.index');
        Route::get('/create', [\App\Http\Controllers\backend\ProductController::class,'create'])->name('backend.product.create');
    });
    // Quản lý sản phẩm
    Route::prefix('users')->group(function(){
        Route::get('/', [\App\Http\Controllers\backend\UserController::class,'index'])->name('backend.user.index');
        Route::get('/create', [\App\Http\Controllers\backend\UserController::class,'create'])->name('backend.user.create');
    });
    // Quản lý danh mục
    Route::prefix('categories')->group(function(){
        Route::get('/', [\App\Http\Controllers\backend\CategoryController::class,'index'])->name('backend.categories.index');
        Route::get('/create', [\App\Http\Controllers\backend\CategoryController::class,'create'])->name('backend.categories.create');
    });
});

// Trang bán hàng
Route::prefix('/')->group(function () {
    Route::get('/',[\App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('frontend.index');
});
