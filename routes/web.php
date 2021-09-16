<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('Frontend/Welcome');
})->name('frontend.welcome');

Route::get('/about', function () {
    return inertia('Frontend/About');
})->name('frontend.about');
