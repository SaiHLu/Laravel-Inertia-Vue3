<?php

use App\Http\Controllers\Backend\AdminUser\AdminUserController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Blog\BlogController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Role\RoleController;
use App\Http\Controllers\Backend\User\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('showLogin');
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    Route::middleware(['auth:admin'])->group(function () {
        Route::any('logout', function () {
            Auth::guard('admin')->logout();

            return redirect()->route('admin.showLogin');
        })->name('logout');

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('adminusers', AdminUserController::class)->except(['show']);
        Route::resource('users', UserController::class)->except(['show']);
        Route::resource('roles', RoleController::class)->except(['show']);
        Route::resource('blogs', BlogController::class)->except('show');
    });
});
