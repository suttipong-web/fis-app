<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\budgetController;
use App\Http\Controllers\AutnController;
use App\Http\Controllers\setUserbypassController;
use App\Http\Controllers\users\UsersController;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return 'ไม่พบหน้าเว็บ';
});

Route::get('/', [AutnController::class, 'index'])->name('index');
Route::get('/login', [AutnController::class, 'login'])->name('login');
Route::post('/login', [AutnController::class, 'checklogin']);

Route::get('/admin/email/{email}', [setUserbypassController::class, 'setUserbypass'])->name('setUserbypass');

// กลุ่ม route ที่ต้องการให้ตรวจสอบการ login ก่อนเข้าถึง
Route::group(['middleware' => ['FisAuth']], function () {
    //ADMIN Fis Account
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    // จัดการ งบประมาณ
    Route::get('/admin/budget/', [budgetController::class, 'index'])->name('budget.index');
    Route::post('/admin/budget/add', [budgetController::class, 'addBudget'])->name('budget.add');    
    //  Depratment ผู้ใช้ทั่วไป 
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    
});
// ENG Route::group(['middleware'
