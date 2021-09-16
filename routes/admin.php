<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin/{value}', function () {
    return inertia('Welcome');
});
