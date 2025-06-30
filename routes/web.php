<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\budgetController;
use App\Http\Controllers\admin\BudgetPlanController;
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
    // เพิ่มงบประมาณ (Create)
    Route::get('/admin/budget/create', [BudgetController::class, 'create'])->name('budget.create');
    Route::post('/admin/budget/store', [BudgetController::class, 'store'])->name('budget.store');
    // แก้ไขงบประมาณ (Edit)
    Route::get('/admin/budget/{id}/edit', [BudgetController::class, 'edit'])->name('budget.edit');
    Route::post('/admin/budget/{id}/update', [BudgetController::class, 'update'])->name('budget.update');
    Route::delete('/admin/budget/{id}', [BudgetController::class, 'destroy'])->name('budget.destroy');

     // จัดการ รหัสย่อยงบประมาณ
    Route::post('/admin/plan', [BudgetPlanController::class, 'store'])->name('budget_plan.store');
    Route::put('/admin/plan/{id}', [BudgetPlanController::class, 'update'])->name('budget_plan.update');
    Route::delete('/admin/plan/{id}', [BudgetPlanController::class, 'destroy'])->name('budget_plan.destroy');
    Route::get('/admin/plan/list/{budget_id}', [BudgetPlanController::class, 'list']);





    //  Depratment ผู้ใช้ทั่วไป 
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    
});
// ENG Route::group(['middleware'
