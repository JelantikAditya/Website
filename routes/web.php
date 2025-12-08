<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('auth.login');
});

// Dashboard route menggunakan controller untuk menampilkan data per-user
use App\Http\Controllers\DashboardController;
Route::get('/dashboard', [DashboardController::class, 'index']);



Route::resource('products', ProductController::class);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout']);

