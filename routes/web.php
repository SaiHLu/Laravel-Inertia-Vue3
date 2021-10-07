<?php

use App\Http\Controllers\Frontend\BlogController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/about', function () {
    return inertia('Frontend/About');
})->name('frontend.about');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('blogs', BlogController::class)->only('index', 'show');
