<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\AutnController;
use App\Http\Controllers\users\UsersController;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return 'ไม่พบหน้าเว็บ';
});

Route::get('/login', [AutnController::class, 'index'])->name('login');
Route::post('/login', [AutnController::class, 'checklogin'])->name('checklogin');

// กลุ่ม route ที่ต้องการให้ตรวจสอบการ login ก่อนเข้าถึง
Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/', [AdminController::class, 'index'])->name('admin.dashboard');
Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->group(function () {
    // Route::get('/admin/', [AdminController::class, 'index'])->name('admin.dashboard');
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('/users/', [UsersController::class, 'index'])->name('user.dashboard');
    });
});

