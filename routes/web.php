<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('Frontend/Welcome');
})->name('frontend.welcome');

Route::get('/about', function () {
    return inertia('Frontend/About');
})->name('frontend.about');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
