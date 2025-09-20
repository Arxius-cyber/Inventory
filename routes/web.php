<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Auth;

// 🔑 Login routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 🔐 Protected routes
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return Auth::user()->role === 'admin'
            ? view('dashboard.admin')
            : view('dashboard.staf');
    })->name('dashboard');

    Route::resource('suppliers', SupplierController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('barangs', BarangController::class);
    Route::resource('transactions', TransactionController::class)->middleware('auth');

});
