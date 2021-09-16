<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return inertia('Backend/Dashboard');
})->name('admin.dashboard');
