<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\User\UserController;

Route::middleware(['auth','prevent-back-history'])->group(function(){
    Route::get("/dashboard",[DashboardController::class,'index'])->name('dashboard.index');
    Route::get("/logout",[AuthController::class,'logout'])->name('logout');

      // ===== User Management (Admin Only) =====
      Route::prefix('dashboard/users')->group(function(){
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'createShowPage'])->name('users.create');
        Route::post('/save', [UserController::class, 'saveUser'])->name('save.user');
      });
});

Route::middleware(['guest','prevent-back-history'])->group(function(){
    Route::get("/",[AuthController::class,'showLoginPage'])->name('login');
    Route::post("/login",[AuthController::class,'doLogin'])->name('do.login');

    Route::get('/request/page', [AuthController::class, 'showPasswordRequestPage'])->name('password.request');
    Route::post('/verify/email', [AuthController::class, 'verifyResetEmail'])->name('password.verify.email');

    Route::get('/password/reset', [AuthController::class, 'showPasswordChangePage'])->name('password.change');
    Route::post('/password/update', [AuthController::class, 'resetPasswordSave'])->name('password.update');
});





